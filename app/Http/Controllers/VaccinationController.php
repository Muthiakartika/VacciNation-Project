<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\healthcare;
use App\Models\User;
use App\Models\vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthcare = healthcare::latest()->paginate(5);
        return view('vaccination.index', compact('healthcare' ))
            ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     * Taking
     * @return \Illuminate\Http\Response
     */
    public function create($centreName)
    {
//        $dataVaccination = DB::table('vaccinations')
//        ->where('name', Auth::user()->name)
//        ->where(function ($query) {
//            $query  ->where('status', "=", 'Pending')
//                    ->orWhere('status', "=", 'Confirm');
//        })->get();
//
//        if(count($dataVaccination) >= 1){
//            return redirect()->route('appointment-vaccination.index')
//                ->with('error','You still have an unfinished vaccine appointment.
//                Please wait for it to be administered before setting up a new appointment');
//        }
//
//        $dataVaccination2 = DB::table('vaccinations')
//        ->where('name', Auth::user()->name)
//        ->where(function ($query) {
//            $query  ->where('status', "=", 'Administered');
//        })->get();
//
//        if(count($dataVaccination2) >= 3){
//            return redirect()->route('appointment-vaccination.index')->with('success',
//                "You've been vaccinated twice. There's no need for another vaccine appointment.");
//        }
        $data = DB::table('vaccines')->join('batches', 'vaccines.vaccineName', 'batches.vaccineName')
            ->join('healthcares', 'batches.centreName', 'healthcares.centreName')
            ->where('healthcares.centreName', $centreName /*taking centre name in index*/)
            ->where('batches.qtyAvailable', '>', '0')
            ->where('batches.expiryDate', '>', 'NOW()')
            ->select('vaccines.*', 'batches.*', 'healthcares.*')->get();
        return view('vaccination.create', compact('data'));
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
            'appointmentDate' => 'required',
            'vaccineDose' => 'required',
            'name' => 'required'
        ]);

        $validDate = DB::table('batches')->where('batches.batchNo', $request->batchNo)
            ->select('batches.expiryDate')->get();

        $validBatch = DB::table('batches')->where('batches.batchNo', $request->batchNo)
            ->select('batches.batchNo')->get();

        // Convert array from database into object
        $expDate = new Carbon();
        foreach ($validDate as $date)
        {
            $expDate = $date;
        }

        if($validBatch->count() > 0 and $validDate->count() > 0)
        {
            if($request->appointmentDate < $expDate->expiryDate)
            {
                batch::where('batchNo', $request->batchNo)->decrement('qtyAvailable', 1);
                vaccination::create($request->all());
                return redirect()->route('appointment-vaccination.index')
                    ->with('success','Vaccination Appointment Successfully Requested');
            }
            else
            {
                return redirect()->back()->with('error', 'Appointment date is past the expiration date!');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Batch have not been found!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vaccination  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('vaccines')->join('batches', 'vaccines.vaccineName', 'batches.vaccineName')
            ->join('vaccinations', 'batches.batchNo', 'vaccinations.batchNo')
            ->join('healthcares', 'batches.centreName', 'healthcares.centreName')
            ->where('vaccinations.name', Auth::user()->name)
            ->select('vaccines.*', 'vaccinations.*', 'healthcares.*')->get();


        $patient = User::find($id);
        return view('vaccination.view-vaccination-status', compact( 'data', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function edit(vaccination $vaccination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vaccination $vaccination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function destroy(vaccination $vaccination)
    {
        //
    }
}
