<?php

namespace App\Http\Controllers;

use App\Models\PatientBio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PatientBioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPatient = DB::table('users')->where('role', 'Patient')-> paginate(5);
        return view('patient.index', compact('dataPatient'))
            ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientBio  $patientBio
     * @return \Illuminate\Http\Response
     */
    public function show(PatientBio $patientBio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientBio  $patientBio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role == 'Patient'){
            $dataPatient = User::findOrFail($id);
            DB::table('users')->where('id', '=', $dataPatient)->get();
            return view('patient.edit', compact('dataPatient'));

        }else {
            return back()->with('error', 'You dont have access');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientBio  $patientBio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nin' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'profile_img' => 'mimes:jpg,png,jpeg,gif,svg',
        ]);

//        ddd($request, $id);

        if($request->file('profile_img'))
        {
            // Delete the old image
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }

            $validateData['profile_img'] = $request->file('profile_img')->store('images');
        }

        User::where('id', '=', $id)->update($validateData);

//        print_r($validateData);
        return redirect()->route('patient-bio.index')
            ->with('success','Patient profile has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientBio  $patientBio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientBio $patientBio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientBio  $patientBio
     * @return \Illuminate\Http\Response
     */
    public function resetEdit($id)
    {
        $dataPatient = User::findOrFail($id);
        DB::table('users')->where('id', '=', $dataPatient)->get();
        return view('patient-reset.edit', compact('dataPatient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientBio  $patientBio
     * @return \Illuminate\Http\Response
     */
    public function resetUpdate(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|max:64|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);

        User::where('id', '=', $id)->update([
            'password' => $request->password,
        ]);
        Auth::logout();

        return redirect()->route('login')
            ->with('success','Password has been updated!!');
    }
}
