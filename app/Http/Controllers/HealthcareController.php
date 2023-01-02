<?php

namespace App\Http\Controllers;

use App\Models\Healthcare;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HealthcareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthcare = Healthcare::all();
        return view('healthcare.index', compact('healthcare'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $healthcare = healthcare::all();
        return view('healthcare.create',  compact('healthcare'));
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
            'address' => 'required',
            'phone' => 'required',
            'optDay' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'img' => 'required|image|file|max:2048'
        ]);

        //validate if there is an image
        if($request->file('img'))
        {
            $request->img = $request->file('img')->store('images');
        }

        // create healthcare object
        healthcare::create([
            'centreName' => $request->centreName,
            'address' => $request->address,
            'phone' => $request->phone,
            'optDay' => $request->optDay,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'img' => $request->img,
            'centreCode' => Str::substr($request->centreName,0,2)
        ]);

        //redirect to registration form
        return redirect()->route('healthcare.index')
            ->with('success', "Healthcare data added successfully");
//        return $request;
//        dd($validateData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function show(Healthcare $healthcare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function edit(Healthcare $healthcare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Healthcare $healthcare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Healthcare $healthcare)
    {
        //
    }
}
