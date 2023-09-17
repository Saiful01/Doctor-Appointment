<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\Admin\AppointmentResource;
use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\DoctorSerial;
use App\Models\GuestPatient;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class AppointmentApiController extends Controller
{
    public function index()
    {
       // abort_if(Gate::denies('appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppointmentResource(Appointment::with(['applicant', 'doctor', 'hospital', 'guest_patient', 'serial', 'status'])->get());
    }
    public function todayAppointments(Request $request)
    {
       // abort_if(Gate::denies('appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $query = Appointment::with(['applicant', 'doctor', 'hospital', 'guest_patient', 'serial', 'status'])->where('appoint_date', Carbon::today());

        if (!$request['hospital_id']){
            $query->where('hospital_id', $request['hospital_id']);
        }

        $appointments = $query->OrderBy('created_at', "DESC")->get();

        return new AppointmentResource($appointments);
    }

    public function store(Request $request)
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
            'dob' => $request['d-m-y'],
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
            'applicant_id' => $request['applicant_id'],
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
       /* $appointment = Appointment::create($request->all());

        DoctorSerial::where('id', $request['serial_id'])->update(['is_book'=> true]);

        return (new AppointmentResource($appointment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);*/
    }

    public function show(Appointment $appointment)
    {
       // abort_if(Gate::denies('appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppointmentResource($appointment->load(['applicant', 'doctor', 'hospital', 'guest_patient', 'serial', 'status']));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());

        return (new AppointmentResource($appointment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Appointment $appointment)
    {
       // abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
