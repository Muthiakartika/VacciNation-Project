@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add New Vaccine</h1>

        <!-- Record DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Add Healthcare-->

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Form Add Vaccine</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('add-vaccine.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Manufacturer<span class="text-danger">*</span></label>
                                <input class="form-control @error('manufacturer') is-invalid @enderror " type="text"
                                       name="manufacturer">

                                @error('manufacturer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Vaccine Name<span class="text-danger">*</span></label>
                                <input class="form-control @error('vaccineName') is-invalid @enderror" type="text"
                                       name="vaccineName">
                                @error('vaccineName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a class="btn btn-primary" href="{{route('add-vaccine.index')}}">Back</a>
                                <input class="btn btn-success" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
