<?php

namespace App\Http\Controllers;

use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function superHome()
    {
        return view('superAdmin.home');
    }

    public function healthcareHome()
    {
        return view('healthcareAdmin.home');
    }

    public function patientHome()
    {
        return view('patient.home');
    }

}
