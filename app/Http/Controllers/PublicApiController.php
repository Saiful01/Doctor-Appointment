<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\DoctorSerial;
use App\Models\GuestPatient;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class PublicApiController extends Controller
{
    public function otpSent(Request $request)
    {
        if ((strpos(URL::previous(), "forgot-password") == true)) {
            $exist = Applicant::where('phone', $request->phone)->first();
            if (!$exist) {
                return [

                    'code' => 201,
                    'message' => "This phone number has no account, Please enter register Phone Number",
                    'data' => $request->all(),
                ];
            }

        } else {

            $validator = Validator::make($request->all(), [
                'phone' => 'unique:applicants',
            ]);

            if ($validator->fails()) {

                return [

                    'code' => 400,
                    'message' => "You have register Account for this Phone Number, Please login your account",
                    'data' => $request->all(),

                ];
            }
        }


        $phone = $request['phone'];
        /*   if (validatePhoneNumber($phone) != 1) {
               return [
                   'code' => 201,
                   'message' => "The number is not valid",
                   'data' => $request->all(),
                   'phone' => $phone,
               ];
           }*/

        $otp = rand(1000, 9999);
        $is_exist = Otp::where('phone', $phone)->where('is_used', false)->orderBy('created_at', 'DESC')->first();
        if ($is_exist) {
            if (Carbon::parse($is_exist->created_at)
                    ->addSeconds(120) >= \Carbon\Carbon::now()) {
                $message = "You have an active OTP";
                $code = 201;
                $expire_time = Carbon::parse($is_exist->created_at)->addSeconds(120);
                $time_expire = $expire_time->diffInSeconds(\Carbon\Carbon::now());

                return [
                    'code' => $code,
                    'message' => $message,
                    'time' => $time_expire,
                    'otp' => $is_exist->otp,
                ];
            } else {
                $code = 200;
                $message = "Check your inbox for OTP";
                Otp::create([
                    'phone' => $phone,
                    'otp' => $otp,
                ]);
                $sms = "Your Dr Mustafiz Appointment verification code is " . $otp;
                /*$sms_status = sendSms($phone, $sms);*/
                return [
                    'code' => $code,
                    'message' => $message,
                    'data' => $request->all(),
                    'otp' => $otp,
                ];

            }
        } else {
            $code = 200;
            $message = "Check your inbox for OTP";

            $sms = "Your Dr Mustafiz Appointment verification code is " . $otp;
            /*$sms_status = sendSms($phone, $sms);*/
            Otp::create([
                'phone' => $phone,
                'otp' => $otp,
            ]);

        }
        return [
            'code' => $code,
            'message' => $message,
            'data' => $request->all(),
            'otp' => $otp,
        ];
    }

    public function otpVerify(Request $request)
    {

        //return $request->all();

        $phone_number = $request['phone'];
        $otp = $request['otp'];
        $is_exist = OTP::where('phone', $phone_number)->where('otp', $otp)->where('is_used', false)->orderBy('created_at', 'DESC')->first();
        if (!$is_exist) {
            return [
                'code' => 400,
                'message' => "OTP is wrong Please enter right OTP",
            ];
        } else {

            if (\Carbon\Carbon::parse($is_exist->created_at)
                    ->addSeconds(120) < \Carbon\Carbon::now()) {

                return [
                    'code' => 400,
                    'message' => "OTP is Expired",
                ];

            } else {

                OTP::where('phone', $phone_number)->where('otp', $otp)->update(['is_used' => true]);
                return [
                    'code' => 200,
                    'message' => "OTP verified Successfully, please Fill next form",
                ];

            }
        }
    }

    public function registrationSave(Request $request)
    {

        // return $request->all();

        $request['password'] = Hash::make($request['password']);
        $createdAt = Carbon::parse($request['dob']);
        $request['dob'] = $createdAt->format('d-m-y');
        try {
            $applicant = Applicant::create($request->all());
            Auth::guard('applicant')->loginUsingId($applicant->id);
            return [
                'code' => 200,
                'message' => "Congratulations! You have successfully registered",
            ];
        } catch (\Exception $e) {
            return [
                'code' => 400,
                'message' => $e->getMessage(),
            ];
        }

    }

    public function appointmentBooking(Request $request)
    {


        if (!$request['appoint_date']) {
            $appoint_date = Carbon::today()->format('Y-m-d');
        } else {
            $date = Carbon::parse($request['appoint_date']);
            $appoint_date = $date->format('Y-m-d');
        }


        $exist = Appointment::where('serial_id', $request['serial_id'])->where('appoint_date', $appoint_date)->first();
        if ($exist) {
            return [
                'code' => 400,
                'message' => "This Serial is Booked For appoint Date , Please Select Another Serial",
            ];

        }

        $createdAt = Carbon::parse($request['dob']);
        $request['dob'] = $createdAt->format('d-m-Y');
        $guest = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'dob' => $request['age'],
            'address' => $request['address'],
        ];

        $guest_id = null;

        if ($request['applicant_type'] == "Other") {
            $guest_id = GuestPatient::insertGetId($guest);
        }
        $serial = DoctorSerial::find($request['serial_id']);

        $date = Carbon::parse($appoint_date);
        $request['appoint_date'] = $date->format('d-m-Y');

        $appointment_array = [
            'appoint_type' => $request['appoint_type'],
            'appointment_token' => uniqid(),
            'applicant_type' => $request['applicant_type'],
            'appoint_date' => $request['appoint_date'],
            'doctor_id' => $serial->doctor_id,
            'hospital_id' => $serial->hospital_id,
            'serial_id' => $serial->id,
            'applicant_id' => Auth::guard('applicant')->user()->id,
            'guest_patient_id' => $guest_id,
            'status_id' => 1,
        ];


        try {
            $appointment = Appointment::create($appointment_array);

            DoctorSerial::where('id', $request['serial_id'])->update(['is_book' => 1]);

            $appointment_status = [
                'appointment_id' => $appointment->id,
                'status_id' => 1,
            ];

            AppointmentStatus::create($appointment_status);

            return [
                'code' => 200,
                'message' => "Congratulations! Your Serial is Booked",
            ];
        } catch (\Exception $e) {
            return [
                'code' => 400,
                'message' => $e->getMessage(),
            ];
        }

    }

    public function resetPassword(Request $request)
    {

        //return $request->all();
        $request['password'] = Hash::make($request['password']);
        $applicant = Applicant::where('phone', $request['phone'])->first();
        try {

            Applicant::where('id', $applicant->id)->update(['password' => $request['password']]);
            return [
                'code' => 200,
                'message' => "Your password has been successfully updated, Please Login Your Account",
            ];
        } catch (\Exception $e) {
            return [
                'code' => 400,
                'message' => $e->getMessage(),
            ];
        }

    }

    public function serialBookingCheck(Request $request)
    {

        //return $request->all();
        $exist = Appointment::where('serial_id', $request['serial_id'])->where('appoint_date', $request['appoint_date'])->first();

        if ($exist) {
            return [
                'code' => 400,
                'message' => "This Serial Is Booked For this Days, Please Select Other Serial",
            ];
        } else {

            return [
                'code' => 200,
                'message' => "Booking This Serial",
            ];

        }


    }

    function validatePhoneNumber($phone)
    {
        if ($phone == null) {
            return 0;
        }
        if (substr($phone, 0, 1) != '0') {
            $phone = "0" . $phone;
        }
        $pattern = "/^(?:\+88|01)?(?:\d{11}|\d{13})$/";
        if (preg_match($pattern, $phone)) {
            return 1;
        }
    }
}
