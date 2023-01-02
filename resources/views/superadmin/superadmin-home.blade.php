@extends('layouts.app')

@section('content')


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Super Admin Dashboard</h1>
                <br>
            </div>
            <!-- Content Row -->
            <div class="row">

                @php
                    $dataHealthcare = DB::table('healthcares')->count();
                    $dataPatient = DB::table('users')->where('role', 'Patient')->count();
                @endphp
                <!-- Healthcares Data -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-auto py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Healthcare Centre</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                        {{$dataHealthcare}}

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient Data -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-auto py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Patient</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{$dataPatient}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Illustrations -->
                <div class="col-lg-12 mb-4">


                    <div class="card shadow mb-4">
{{--                            <div class="card-header py-3">--}}
{{--                                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>--}}
{{--                            </div>--}}
                        <div class="card-body">
{{--                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce--}}
{{--                                CSS bloat and poor page performance. Custom CSS classes are used to create--}}
{{--                                custom components and custom utility classes.</p>--}}
{{--                            <p class="mb-0">Before working with this theme, you should become familiar with the--}}
{{--                                Bootstrap framework, especially the utility classes.</p>--}}
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                     src="{{asset('sb-admin/img/undraw_doctors_hwty.svg')}}" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.container-fluid -->

@endsection
