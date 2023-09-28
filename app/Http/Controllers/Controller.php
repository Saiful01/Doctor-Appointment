<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Blog;
use App\Models\District;
use App\Models\Division;
use App\Models\Doctor;
use App\Models\DoctorSerial;
use App\Models\Hospital;
use App\Models\Platform;
use App\Models\Upazila;
use App\Models\Video;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function home()
    {

          $doctor = Doctor::with(['designation', 'specialists', 'hospitals', 'days', 'media'])->first();

          $hospitals= Hospital::get();
          $blogs= Blog::get();
          $videos= Video::get();
        return view('frontend.home.index',compact('doctor','hospitals','blogs','videos'));
    }
    public function appointment()
    {

         $hospital1= DoctorSerial::with('hospital')->where('hospital_id', 1.)->get();
         $hospital2= DoctorSerial::with('hospital')->where('hospital_id', 2)->get();
         return view('frontend.appointment.index',compact('hospital1','hospital2'));
    }

    public function registration()
    {
        if (Auth::guard('applicant')->check()) {
            return redirect()->route('applicant.profile');
        }

        $divisions = Division::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $upazilas = Upazila::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.login.registration', compact('districts', 'divisions', 'upazilas'));


    }


    public
    function login(Request $request)
    {
       // return $request->all();
        if (Auth::guard('applicant')->check()) {
            return redirect()->route('applicant.profile');
        }
        if ($request->isMethod("post")) {

            $validator = Validator::make($request->all(), [
                'phone' => 'required|regex:/(01)[0-9]{9}/',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                if ($errors->has('phone')) {

                    Alert::error('দুঃখিত! ', $errors->first('phone'));
                    return back()->withInput();
                }
                if ($errors->has('password')) {
                    Alert::error('দুঃখিত! ', "আপনার পাসওয়ার্ড টি অনূগ্রহ করে লিখুন ");
                    return back()->withInput();

                }
            }


            //return $request->all();
            if (Auth::guard('applicant')->attempt(['phone' => $request['phone'], 'password' => $request['password']])) {
                if ($request['previous_route'] == null) {
                    return Redirect::to('/patient/profile');
                } else {
                    return Redirect::to($request['previous_route']);
                }

            } else {
                $exist = Applicant::where('phone', $request->phone)->first();
                if ($exist) {
                    Alert::error('Sorry! ', "Your password does not match");
                } else {
                    Alert::error('Sorry! ', "You hove no account information for this number , please Register account");
                }

                return back()->withInput();
            }

        }

        return view('frontend.login.login');
    }

    public function serialBookingUpdate()
    {
        DoctorSerial::where('is_book', true)->update([
            'is_book' => false,
        ]);
        $datas = DoctorSerial::all();

        return [
            'code' => 200,
            'message' => 'Successfully updated',
            'data' => $datas,
        ];
    }
    public function blogDetails($id)
    {
      $blog= Blog::find($id);

      return view('frontend.blog.details', compact('blog'));
    }
    public function contact()
    {
      $contact= Platform::find(1);

      return view('frontend.contact.index', compact('contact'));
    }
}
