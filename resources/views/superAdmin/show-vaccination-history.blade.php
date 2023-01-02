@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccination History</h1>

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Patient Name</th>
                                <th>Healthcare Centre</th>
                                <th>Vaccine Dose</th>
                                <th>Vaccine Name</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Patient Name</th>
                                <th>Healthcare Centre</th>
                                <th>Vaccine Dose</th>
                                <th>Vaccine Name</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($dataHistory as $dh)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$dh->patientName}}</td>
                                    <td>{{$dh->centreName}}</td>
                                    <td>{{$dh->vaccineDose}}</td>
                                    <td>{{$dh->vaccineName}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
