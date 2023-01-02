<?php

namespace App\Http\Controllers;

use App\Models\Queues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataQueue = Queues::all();
        return view('queue.index', compact('dataQueue'))
            ->with('i', (request()->input('page', 1)-1)*5);

    }
}
