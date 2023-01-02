<?php

namespace App\Http\Controllers;

use App\Models\SuperAdminBio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperAdminBioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSuper = DB::table('users')->where('role', 'SuperAdmin')->get();
        return view('superAdmin.index', compact('dataSuper'))
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
     * @param  \App\Models\SuperAdminBio  $superAdminBio
     * @return \Illuminate\Http\Response
     */
    public function show(SuperAdminBio $superAdminBio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperAdminBio  $superAdminBio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superAdmin = User::findOrFail($id);
        DB::table('users')->where('id', '=', $superAdmin)->get();
        return view('superAdmin.edit', compact('superAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuperAdminBio  $superAdminBio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperAdminBio  $superAdminBio
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperAdminBio $superAdminBio)
    {
        //
    }
}
