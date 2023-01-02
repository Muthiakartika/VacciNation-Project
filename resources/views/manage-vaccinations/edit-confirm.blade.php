@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Confirm Vaccination</h1>
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

                <form method="POST" action="{{route('manage-vaccinations.confirm-update', $vaccination->id)}}">
                    @csrf
{{--                    @method('PUT')--}}
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
                        <input class="form-control" type="hidden" name="status" value="Confirm">
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

