@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Reject Vaccination</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Vaccination ID</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Vaccine Dose</th>
                            <th>Appointment</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Vaccination ID</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Vaccine Dose</th>
                            <th>Appointment</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($dataVaccination as $vaccinations)
                            @if($vaccinations->id == $vaccination->id)
                                <tr>
                                    <td>{{$vaccinations->id}}</td>
                                    <td>{{$vaccinations->patientName}}</td>
                                    <td>{{$vaccinations->batchNo}}</td>
                                    <td>{{$vaccinations->vaccineDose}}</td>
                                    <td>{{$vaccinations->appointmentDate}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="POST" action="{{route('manage-vaccinations.reject-update', $vaccination->id)}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="{{$vaccination->id}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="batchNo" value="{{$vaccination->batchNo}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="patientName" value="{{$vaccination->patientName}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="email" value="{{$vaccination->email}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="status" value="Reject">
                    </div>
                    <div class="form-group">
                        <label>Remark<span class="text-danger">*</span></label>
                        <input class="form-control @error('remarks') is-invalid @enderror" type="text"
                               name="remarks">
                        @error('remarks')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <a class="btn btn-primary" href="{{route('manage-vaccination.index')}}" >Back</a>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

