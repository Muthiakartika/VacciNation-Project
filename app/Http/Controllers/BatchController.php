<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Healthcare;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch = DB::table('vaccines')->join('batches', 'vaccines.vaccineName',
            '=', 'batches.vaccineName')
            ->where('batches.centreName', Auth::user()->centreName)
            ->select('vaccines.*', 'batches.*')->paginate(5);
        return view('batch.index', compact('batch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TAKING VACCINE DATA FROM THE MODEL
        $vaccine = Vaccine::all();
        // TAKING HEALTHCARE DATA FROM THE MODEL
        $healthcare = Healthcare::all();
        return view('batch.create', compact( 'vaccine', 'healthcare'));
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
            'batchNo' => 'required',
            'expiryDate' => 'required',
            'qtyAvailable' => 'required',
            'vaccineName' => 'required',
            'centreName' => 'required',
        ]);


        Batch::create($request->all());

        //redirect to registration form
        return redirect()->route('batches.index')
            ->with('success', "Batch data added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
