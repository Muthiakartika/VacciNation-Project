<?php

namespace App\Http\Controllers;

use App\Models\Healthcare;
use App\Models\HealthcareAdmin;
use App\Models\User;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HealthcareAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = DB::table('users')->where('role', 'HealthcareAdmin')-> paginate(5);
        $adminhc = User::all();
        return view('healthcareAdmin.index', compact('admin', 'adminhc'))
            ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $healthcare = Healthcare::all();
        $admin = DB::table('users')->where('role', 'HealthcareAdmin')-> paginate(5);
        return view('healthcareAdmin.create', compact('healthcare', 'admin'));
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
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8|max:64|confirmed',
            'email_verified_at' => '',
        ]);
        $request['password'] = bcrypt($request->password);

        User::create([
            'centreName' => $request->centreName,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'email_verified_at' => $request->email_verified_at,
        ]);

        return redirect()->route('admin-healthcare.index')
            ->with('success','Healthcare administrator registered successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthcareAdmin  $healthcareAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(HealthcareAdmin $healthcareAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthcareAdmin  $healthcareAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $healthcareAdmin = User::findOrFail($id);
        DB::table('users')->where('id', '=', $healthcareAdmin)->get();
        return view('healthcareAdmin.edit', compact('healthcareAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HealthcareAdmin  $healthcareAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'centreName' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile_img' => 'mimes:jpg,png,jpeg,gif,svg',
        ]);

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
        return redirect()->route('admin-healthcare.reset-index')
            ->with('success','Healthcare administrator profile has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HealthcareAdmin  $healthcareAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthcareAdmin $healthcareAdmin)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetIndex()
    {
        $admin = DB::table('users')->where('role', 'HealthcareAdmin')->get();
        return view('admin-reset.index', compact('admin'))
            ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthcareAdmin  $healthcareAdmin
     * @return \Illuminate\Http\Response
     */
    public function resetEdit($id)
    {
        $healthcareAdmin = User::findOrFail($id);
        DB::table('users')->where('id', '=', $healthcareAdmin)->get();
        return view('admin-reset.edit', compact('healthcareAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HealthcareAdmin  $healthcareAdmin
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
