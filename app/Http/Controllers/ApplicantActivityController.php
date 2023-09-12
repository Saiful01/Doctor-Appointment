<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantActivityController extends Controller
{
    public function profile()
    {

        $appointments = Appointment::with(['applicant', 'doctor', 'hospital', 'guest_patient', 'serial', 'status'])
            ->where('applicant_id', Auth::guard('applicant')->user()->id)
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get();

        return view('frontend.patient.index', compact('appointments'));
    }

    public function logout()
    {
        Auth::guard('applicant')->logout();
        return redirect('/');
    }
}
