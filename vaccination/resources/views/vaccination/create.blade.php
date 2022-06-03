@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccination Form</h1>

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Available Vaccine Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Manufacturer</th>
                            <th>Vaccine</th>
                            <th>Exp Date</th>
                            <th>Qty</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $dataVaccination)

                            <tr>
                                <td>{{$dataVaccination->batchNo}}</td>
                                <td>{{$dataVaccination->manufacturer}}</td>
                                <td>{{$dataVaccination->vaccineName}}</td>
                                <td>{{$dataVaccination->expiryDate}}</td>
                                <td>{{$dataVaccination->qtyAvailable}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tr>
                            <th>Batch</th>
                            <th>Manufacturer</th>
                            <th>Vaccine</th>
                            <th>Exp Date</th>
                            <th>Qty</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Input</h6>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('appointment-vaccination.store')}}">
                    @csrf
                    <input class="form-control" type="hidden" name="name" value="{{auth()->user()->name}}">
                    <div class="form-group">
                        <label for="vaccineDose">Vaccine Dose <span class="text-danger">*</span></label>
                        <select type="text" class="form-control form-control-user @error('vaccineDose') is-invalid @enderror"
                                name="vaccineDose" onchange="showDiv(this)">
                            <option value="#" disabled selected>--- Vaccine Dose  ---</option>
                            <option value="1 Dose" >First Dose</option>
                            <option value="2 Dose" >Second Dose</option>
                            <option value="Booster" >Booster</option>
                        </select>
                        @error('vaccineDose')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Batch No<span class="text-danger">*</span></label>
                        <input class="form-control @error('batchNo') is-invalid @enderror " type="text" name="batchNo">
                        @error('batchNo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Appointment Date<span class="text-danger">*</span></label>
                        <input class="form-control @error('appointmentDate') is-invalid @enderror"
                               type="date" name="appointmentDate">
                        @error('appointmentDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary" href="{{route('appointment-vaccination.index')}}">Back</a>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
