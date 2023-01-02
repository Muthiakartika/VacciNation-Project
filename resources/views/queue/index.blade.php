@extends('layouts.app')

@section('content')

    @php
        $validUser = DB::table('vaccinations')
           ->join('batches', 'vaccinations.batchNo', '=', 'batches.batchNo')
           ->join('healthcares', 'batches.centreName', '=', 'healthcares.centreName')
           ->join('users', 'vaccinations.patientName', '=', 'users.name')
           ->join('queues', 'users.name', '=', 'queues.patientName')
           ->where('vaccinations.status', '=', 'Confirm')
           ->where('queues.patientName', '=', auth()->user()->name)
           ->get();
    @endphp

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Queue Number</h1>

        <div class="card" style="width: 18rem;">
            @foreach( $dataQueue as $queue)
                @if($queue->patientName == auth()->user()->name)
                    <div class="card-body">
                        <h5 class="card-title text-center">Your Number</h5>
                        <br>
                        @if($queue->number > 0 and $queue->number < 10)
                            <h1 class="card-subtitle mb-2 text-muted font-weight-bolder text-center">
                                {{$queue->centreCode}}00{{$queue->number}}</h1>
                        @endif
                        @if($queue->number > 10 and $queue->number < 100)
                            <h1 class="card-subtitle mb-2 text-muted font-weight-bolder text-center text-capitalize">
                                {{$queue->centreCode}}0{{$queue->number}}</h1>
                        @endif
                        <br>
                        <hr>
                        <p class="card-text text-sm-center">Kindly attend in accordance with your queue number</p>
                    </div>
                @else
                <div class="card-body">
                    <h5 class="card-title text-center">You don't have any queues number</h5>
                </div>
                @endif

            @endforeach
        </div>

    </div>
@endsection

