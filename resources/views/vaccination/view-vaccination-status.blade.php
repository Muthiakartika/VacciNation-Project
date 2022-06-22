@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Patient Vaccination Status</h1>

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Patient Vaccination Status Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Vaccine Dose</th>
                            <th>Vaccine</th>
                            <th>Appointment</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Vaccine Dose</th>
                            <th>Vaccine</th>
                            <th>Appointment</th>
                            <th>Status</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($data as $dataVaccination)

                            @if($dataVaccination->vaccineDose == "1 Dose")
                                <tr>
                                    <td>{{$dataVaccination->name}}</td>
                                    <td>{{$dataVaccination->batchNo}}</td>
                                    <td>{{$dataVaccination->centreName}}</td>
                                    <td>{{$dataVaccination->address}}</td>
                                    <td>{{$dataVaccination->vaccineDose}}</td>
                                    <td>{{$dataVaccination->vaccineName}}</td>
                                    <td>{{$dataVaccination->appointmentDate}}</td>


                                    @if($dataVaccination->status == 'Pending')
                                        <td><p class="btn btn-warning btn-sm">Pending</p></td>
                                    @elseif($dataVaccination->status == 'Confirm')
                                        <td><p class="btn btn-success btn-sm">Confirm</p></td>
                                    @endif
                                </tr>

                            @endif
                            @if($dataVaccination->vaccineDose == "2 Dose")
                                <tr>
                                    <td>{{$dataVaccination->name}}</td>
                                    <td>{{$dataVaccination->batchNo}}</td>
                                    <td>{{$dataVaccination->centreName}}</td>
                                    <td>{{$dataVaccination->address}}</td>
                                    <td>{{$dataVaccination->vaccineDose}}</td>
                                    <td>{{$dataVaccination->vaccineName}}</td>
                                    <td>{{$dataVaccination->appointmentDate}}</td>


                                    @if($dataVaccination->status == 'Pending')
                                        <td><p class="btn btn-warning btn-sm">Pending</p></td>
                                    @elseif($dataVaccination->status == 'Confirm')
                                        <td><p class="btn btn-success btn-sm">Confirm</p></td>
                                    @endif
                                </tr>
                            @endif
                            @if($dataVaccination->vaccineDose == "Booster")
                                <tr>
                                    <td>{{$dataVaccination->name}}</td>
                                    <td>{{$dataVaccination->batchNo}}</td>
                                    <td>{{$dataVaccination->centreName}}</td>
                                    <td>{{$dataVaccination->address}}</td>
                                    <td>{{$dataVaccination->vaccineDose}}</td>
                                    <td>{{$dataVaccination->vaccineName}}</td>
                                    <td>{{$dataVaccination->appointmentDate}}</td>


                                    @if($dataVaccination->status == 'Pending')
                                        <td><p class="btn btn-warning btn-sm">Pending</p></td>
                                    @elseif($dataVaccination->status == 'Confirm')
                                        <td><p class="btn btn-success btn-sm">Confirm</p></td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

