<?php

namespace App\Http\Controllers;

use App\Models\healthcare;
use Illuminate\Http\Request;

class HealthcareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthcare = healthcare::latest()->paginate(5);
        return view('healthcare.index', compact('healthcare'))
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

        $validateData = $request->validate([
            'centreName' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'optDay' => 'required',
            'img' => 'required|image|file|max:2048',

        ]);

        //validate if there is an image
        if($request->file('img'))
        {
            $validateData['img'] = $request->file('img')->store('images');
        }
        // create healthcare object
        healthcare::create($validateData);

        //redirect to registration form
        return redirect()->route('add-healthcare.index')
            ->with('success', "Healthcare data added successfully");
//        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function show(healthcare $healthcare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function edit(healthcare $healthcare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, healthcare $healthcare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function destroy(healthcare $healthcare)
    {
        //
    }
}
