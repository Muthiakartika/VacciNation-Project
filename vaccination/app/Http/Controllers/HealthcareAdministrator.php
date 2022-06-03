<?php

namespace App\Http\Controllers;

use App\Models\healthcare;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HealthcareAdministrator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthcareAdmin = DB::table('users')->where('role', 'HealthcareAdmin')-> paginate(5);
        $adminhc = User::all();
        return view('superadmin.index', compact('healthcareAdmin', 'adminhc'))
            ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $healthcare = healthcare::all();
        $healthcareAdmin = DB::table('users')->where('role', 'HealthcareAdmin')-> paginate(5);
        return view('superadmin.create', compact('healthcare', 'healthcareAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'centreName' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);
        $request['password'] = bcrypt($request->password);

        User::create($request->all());

        return redirect()->route('register-adminhc.index')
            ->with('success','Healthcare administrator registered successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
