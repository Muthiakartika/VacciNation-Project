@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccination Appointment</h1>
        <p class="mb-4">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif</p>

        <!-- Topbar Search -->
        <div class="mb-4">
            <form class="d-none d-sm-inline-block form-inline mr-5 ml-md-6 my-6 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-white  " placeholder="Search for..."
                           aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form><br>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Healthcare Recommendation</h6>
                    </div>
{{--                    @foreach($healthcare as $datahc)--}}

                        <img src="https://source.unsplash.com/1200x400?hospital" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title h3 mb-2 text-gray-600">Healthcare Centre</h3>
                            <h6 class="card-text h6 mb-2 text-gray-500">Address</h6>
                            <h6 class="card-text h6 mb-2 text-gray-500">Phone Number</h6>
                            <p class="card-text text-gray-500"><small class="text-muted">Operational Day</small></p>
                            <a href="#" class=" btn btn-sm btn-success">choose</a>
                        </div>
{{--                    @endforeach--}}
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Healthcare Centre Data</h6>
                    </div>
                    @foreach($healthcare as $datahc)
                            <div class="card mb-4">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        {{--adding image in the post--}}
                                        @if($datahc->img)
                                            <img src="{{asset('storage/'.$datahc->img)}}"
                                                 class="img-fluid rounded-start" alt="...">
                                        @else
                                            <img src="https://source.unsplash.com/300x200?hospital"
                                                 class="img-fluid rounded-start" alt="...">
                                        @endif

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title h3 mb-2 text-gray-600">{{$datahc["centreName"]}}</h3>
                                            <h6 class="card-text h6 mb-2 text-gray-500">{{$datahc["address"]}}</h6>
                                            <h6 class="card-text h6 mb-2 text-gray-500">{{$datahc["phone"]}}</h6>
                                            <p class="card-text text-gray-500">
                                                <small class="text-muted">{{$datahc["optDay"]}}</small></p>
                                            <a href="{{route('vaccine-appointment',$datahc->centreName)}}"
                                               class="btn btn-success">choose</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

