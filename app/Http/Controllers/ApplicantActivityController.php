<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantActivityController extends Controller
{
    public function profile()
    {
        return "Applicant Profile";
        return view('frontend.applicant.dashboard');
    }
    public function logout()
    {
      Auth::guard('applicant')->logout();
      return redirect('/');
    }
}
