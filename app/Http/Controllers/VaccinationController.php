<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmEmail;
use App\Mail\RejectEmail;
use App\Models\Batch;
use App\Models\Healthcare;
use App\Models\Queue;
use App\Models\Queues;
use App\Models\User;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;

class VaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $healthcare = Healthcare::latest();

        // Static IP
        $lat = -8.6843795;
        $lon = 115.220886;
//         dd($location);
        // Dynamic IP
//         $location = Location::get('https://'.$request->ip());
//         $lat = $location->latitude;
//         $lon = $location->longitude;


        // Finding the nearest healthcare centre
        $loc_healthcare = Healthcare::select("healthcares.*"
            ,DB::raw("6371 * acos(cos(radians(" . $lat . "))
                        * cos(radians(healthcares.latitude))
                        * cos(radians(healthcares.longitude) - radians(" . $lon . "))
                        + sin(radians(" .$lat. "))
                        * sin(radians(healthcares.latitude))) AS distance"))
            ->having('distance', '<', 10)->orderBy('distance')->get();
//        dd($loc_healthcare );

        // Validation for searching healthcare
        if(\request('search')) {
            $healthcare->where('centreName', 'like', '%' . \request('search').'%');
        }
        return view('vaccination.index', ["healthcare" => $healthcare->get()], compact('loc_healthcare'))
            ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($centreName)
    {

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
            'patientName' => 'required',
            'email' => 'required',
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
                Batch::where('batchNo', $request->batchNo)->decrement('qtyAvailable', 1);
                Vaccination::create($request->all());
                return redirect()->route('vaccinations.index')
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
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function statusShow($id)
    {
        $data = DB::table('vaccines')->join('batches', 'vaccines.vaccineName', 'batches.vaccineName')
            ->join('vaccinations', 'batches.batchNo', 'vaccinations.batchNo')
            ->join('healthcares', 'batches.centreName', 'healthcares.centreName')
            ->where('vaccinations.patientName', Auth::user()->name)
            ->select('vaccines.*', 'vaccinations.*', 'healthcares.*')->get();
        $vaccination = User::find($id);
        return view('vaccination.status-show', compact( 'data', 'vaccination'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccination $vaccination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccination $vaccination)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexManageVaccination()
    {
        $dataVaccination = DB::table('vaccinations')->join('batches', 'batches.batchNo', 'vaccinations.batchNo')
            ->join('users', 'users.centreName', 'batches.centreName')
            ->where('batches.centreName', '=', Auth::user()->centreName)
            ->select('vaccinations.*')->get();
        return view('manage-vaccinations.index', compact('dataVaccination'  ))
            ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function confirmEdit($id)
    {
        $dataVaccination = Vaccination::all();
        $vaccination = Vaccination::findOrFail($id);
        DB::table('vaccinations')->whereIn('id', $vaccination->pluck('id'))->get();
        return view('manage-vaccinations.edit-confirm', compact('vaccination', 'dataVaccination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmUpdate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'email' => 'required',
            'patientName' => 'required',
        ]);

        $vaccination = Vaccination::findOrFail($id);
        $vaccination->status = $request->status;
        $vaccination->email = $request->email;
        $vaccination->patientName = $request->patientName;
        $vaccination->timestamps;
        $vaccination->save();

        // Taking healthcare code from healthcares table
        $centreCode = DB::table('healthcares')
            ->join('batches', 'healthcares.centreName', '=', 'batches.centreName')
            ->join('vaccinations', 'batches.batchNo', '=', 'vaccinations.batchNo')
            ->join('users', 'users.name', '=', 'vaccinations.patientName')
            ->where('vaccinations.patientName', '=', $vaccination->patientName)
            ->select('healthcares.centreCode')->get();

        // Convert array itu object
        foreach ($centreCode as $code){
            $centreData = $code->centreCode;
        }
        $queueNum = 0;

        // Adding new queue
        Queues::create([
            'centreCode' => Str::upper($centreData),
            'number' => ++$queueNum,
            'patientName' => $request->patientName
            ]);


        //sending email
        $details = [
                'title' => 'Vaccination Appointment Information',
                'body' => 'Hello Mr/Mrs, we have confirmed your Appointment Vaccination request, here are the details: '
            ];
        Mail::to($vaccination->email)->send(new ConfirmEmail($details));

        return redirect()->route('manage-vaccination.index')->with('succes','Vaccination has been confirmed!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function rejectEdit($id)
    {
        $dataVaccination = Vaccination::all();
        $vaccination = Vaccination::findOrFail($id);
        DB::table('vaccinations')->whereIn('id', $vaccination->pluck('id'))->get();
        return view('manage-vaccinations.edit-reject', compact('vaccination', 'dataVaccination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function rejectUpdate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'email' => 'required',
            'patientName' => 'required',
            'remarks' => 'required',
        ]);

        $vaccination = Vaccination::findOrFail($id);
        $vaccination->status = $request->status;
        $vaccination->email = $request->email;
        $vaccination->patientName = $request->patientName;
        $vaccination->remarks = $request->remarks;
        $vaccination->timestamps;
        $vaccination->save();

        //sending email
        $details = [
            'title' => 'Vaccination Appointment Information',
            'body' => 'Hello Mr/Mrs, we regret to inform you that your Vaccination Appointment
               request has been rejected, here are the details: '
        ];
        Mail::to($vaccination->email)->send(new RejectEmail($details));

        //ddd($vaccination);
        return redirect()->route('manage-vaccination.index')->with('succes','Vaccination has been rejected!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function administeredCreate($id)
    {
        $dataVaccination = Vaccination::all();
        $vaccination = Vaccination::findOrFail($id);
        DB::table('vaccinations')->whereIn('id', $vaccination->pluck('id'))->get();
        return view('manage-vaccinations.edit-administered', compact('vaccination', 'dataVaccination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function administeredUpdate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'remarks' => 'required',
            'patientName' => 'required',
            'email' => 'required',
            'batchNo' => 'required',
        ]);

        $vaccination = Vaccination::findOrFail($id);
        $vaccination->status = $request->status;
        $vaccination->email = $request->email;
        $vaccination->patientName = $request->patientName;
        $vaccination->remarks = $request->remarks;
        $vaccination->timestamps;
        $vaccination->save();

        // Delete Queue
        $lastData = Queues::latest()->first();
        $lastData->delete();

        //Increment qty Administered
        Batch::where('batchNo', $request->batchNo)->increment('qtyAdministered', 1);

        //ddd($vaccination);
        return redirect()->route('manage-vaccination.index')
            ->with('success', "Vaccination has been administered!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccination $vaccination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccination $vaccination)
    {
        //
    }

    public function createVaccination($centreName)
    {
        $dataVaccination = DB::table('vaccinations')
            ->where('patientName', Auth::user()->name)
            ->where(function ($query) {
                $query  ->where('status', "=", 'Pending')
                    ->orWhere('status', "=", 'Confirm');
            })->get();

        if(count($dataVaccination) >= 1){
            return redirect()->route('vaccinations.index')
                ->with('error','You still have an unfinished vaccine appointment.
                Please wait for it to be administered before setting up a new appointment');
        }

        $dataVaccination2 = DB::table('vaccinations')
            ->where('patientName', Auth::user()->name)
            ->where(function ($query) {
                $query  ->where('status', "=", 'Administered');
            })->get();

        if(count($dataVaccination2) >= 3){
            return redirect()->route('vaccinations.index')->with('success',
                "You've been vaccinated twice. There's no need for another vaccine appointment.");
        }
        $data = DB::table('vaccines')->join('batches', 'vaccines.vaccineName', 'batches.vaccineName')
            ->join('healthcares', 'batches.centreName', 'healthcares.centreName')
            ->where('healthcares.centreName', $centreName /*taking centre name in index*/)
            ->where('batches.qtyAvailable', '>', '0')
            ->where('batches.expiryDate', '>', 'NOW()')
            ->select('vaccines.*', 'batches.*', 'healthcares.*')->get();

        return view('vaccination.create', compact('data'));
    }

    /**
     * Display the vaccination history.
     *
     * @return \Illuminate\Http\Response
     */
    public function showVaccinationHistory()
    {
        $dataHistory = DB::table('vaccinations')
            ->join('batches', 'vaccinations.batchNo','=','batches.batchNo')
            ->where('vaccinations.status', '=', 'Administered')
            ->get();

        return view('superAdmin.show-vaccination-history', compact('dataHistory'))
            ->with('i', (request()->input('page', 1)-1)*5);
    }
}
