<?php

namespace App\Http\Controllers;

use App\Models\vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccine = vaccine::latest()->paginate(5);
        return view('vaccine.index', compact('vaccine'))
            ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaccine.create');
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
            'manufacturer' => 'Required',
            'vaccineName'  => 'Required',
        ]);

        // create vaccine object
        vaccine::create($request->all());

        //redirect to registration form
        return redirect()->route('add-vaccine.index')
            ->with('success', "Vaccine data added successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show(vaccine $vaccine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function edit(vaccine $vaccine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vaccine $vaccine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(vaccine $vaccine)
    {
        //
    }
}
