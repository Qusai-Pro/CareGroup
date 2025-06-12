<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;

class HomeController extends Controller
{
  public function redirect()
{
    if (Auth::id()) {
        if (Auth::user()->usertype == '0') {
            $doctors = Doctor::all();
            return view('index', compact('doctors'));
        } elseif (Auth::user()->usertype == '1') {
            return view('admin.home');
        } elseif (Auth::user()->usertype == '2') {
            return redirect()->route('Doctor.dashboard'); 
        } else {
            return redirect()->back();
        }
    } else {
        return redirect()->back();
    }
}

    public function index()
{
    $doctors = Doctor::all(); // fetch all doctors
    return view('index', compact('doctors')); // pass to the index view
}
        public function about()
    {
        $doctors = Doctor::all(); // fetch all doctors
    return view('about', compact('doctors')); // pass to the about view
    }

        public function doctor()
    {
        return view('doctor');
    }
        public function department()
    {
        return view('department');
    }
            public function contact()
    {
        return view('contact');
    }
            public function blog()
    {
        return view('blog');
    }
      public function DoctorSearch()
    {
        return view('DoctorSearch');
    }
          public function chat()
    {
        return view('user.chat');
    }

}
