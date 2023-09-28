<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Appointment;
use App\Models\District;
use App\Models\Division;
use App\Models\DoctorSerial;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ApplicantActivityController extends Controller
{
    public function profile()
    {

        $appointments = Appointment::with(['applicant', 'doctor', 'hospital', 'guest_patient', 'serial', 'status'])
            ->where('applicant_id', Auth::guard('applicant')->user()->id)
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get();

        $divisions = Division::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $upazilas = Upazila::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        return view('frontend.patient.index', compact('appointments','districts', 'divisions', 'upazilas'));
    }

    public function profileUpdate(Request $request)
    {

        Applicant::where('id', Auth::guard('applicant')->user()->id)->update($request->except('_token'));

        Alert::success('Congratulations ', "Your Data Updated");

        return back();
    }
    public function appointmentList()
    {

        $appointments = Appointment::with(['applicant', 'doctor', 'hospital', 'guest_patient', 'serial', 'status'])
            ->where('applicant_id', Auth::guard('applicant')->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('frontend.patient.appointment', compact('appointments'));
    }

    public function logout()
    {
        Auth::guard('applicant')->logout();
        return redirect('/');
    }
}
