<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required | max:255 | email',
            'password' => 'required | max:64 | min:8',
        ]);

        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']),
            $request->get('remember'))){
            if (auth()->user()->role == 'SuperAdmin') {
                return redirect()->route('super-admin.home');
            }
            elseif (auth()->user()->role == 'HealthcareAdmin') {
                return redirect()->route('healthcare-admin.home');
            }
            elseif (auth()->user()->role == 'Patient') {
                return redirect()->route('patient.home');
            }
            else {
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')->with('error','Email or Password are incorrect.');
        }
    }
}
