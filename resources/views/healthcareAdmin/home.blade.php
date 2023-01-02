@extends('layouts.app')

@section('content')

    @php
        // count data pending
        $dataPending = \Illuminate\Support\Facades\DB::table('vaccinations')
        ->join('batches', 'vaccinations.batchNo', 'batches.batchNo')
        ->join('healthcares', 'batches.centreName', 'healthcares.centreName')
        ->where('vaccinations.status', '=', 'Pending')
        ->where('healthcares.centreName', '=', \Illuminate\Support\Facades\Auth::user()->centreName)
        ->count();

        // count data confirm
        $dataConfirm = \Illuminate\Support\Facades\DB::table('vaccinations')
        ->join('batches', 'vaccinations.batchNo', 'batches.batchNo')
        ->join('healthcares', 'batches.centreName', 'healthcares.centreName')
        ->where('vaccinations.status', '=', 'Confirm')
        ->where('healthcares.centreName', '=', \Illuminate\Support\Facades\Auth::user()->centreName)
        ->count();

        // count data reject
        $dataReject = \Illuminate\Support\Facades\DB::table('vaccinations')
        ->join('batches', 'vaccinations.batchNo', 'batches.batchNo')
        ->join('healthcares', 'batches.centreName', 'healthcares.centreName')
        ->where('vaccinations.status', '=', 'Reject')
        ->where('healthcares.centreName', '=', \Illuminate\Support\Facades\Auth::user()->centreName)
        ->count();

        // count data administered
        $dataAdministered = \Illuminate\Support\Facades\DB::table('vaccinations')
        ->join('batches', 'vaccinations.batchNo', 'batches.batchNo')
        ->join('healthcares', 'batches.centreName', 'healthcares.centreName')
        ->where('vaccinations.status', '=', 'Administered')
        ->where('healthcares.centreName', '=', \Illuminate\Support\Facades\Auth::user()->centreName)
        ->count();
    @endphp
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{auth()->user()->centreName}} Dashboard</h1>
                <br>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Healthcares Data -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-auto py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dataPending}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-history fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient Data -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-auto py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Administered</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dataAdministered}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-redo fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient Data -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-auto py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Confirm</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dataConfirm}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient Data -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-auto py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Rejected</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dataReject}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-times fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Illustrations -->
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-2 px-sm-3 mt-2 mb-3" style="width: 25rem;"
                                     src="{{asset('admin/img/undraw_medicine_b-1-ol.svg')}}" alt="Healthcare Admin">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

@endsection
