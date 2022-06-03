<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->user()->role == 'SuperAdmin')
        {
            return view('superadmin.superadmin-home');
        }
        elseif (auth()->user()->role == 'HealthcareAdmin')
        {
            return view('adminhealthcare.adminhc-home');
        }
        elseif (auth()->user()->role == 'Patient')
        {
            return view('patient.patient-home');
        }
        else
        {
            return view('welcome');
        }
    }

}
