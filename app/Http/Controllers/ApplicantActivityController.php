<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantActivityController extends Controller
{
    public function profile()
    {
        return "Applicant Profile";
        return view('frontend.applicant.dashboard');
    }
}
