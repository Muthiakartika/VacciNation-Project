@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Add New Healthcare Centre</h1>

        <p class="mb-4">
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
                <div class="card-header py-6">
                    <a href="{{route('healthcare.create')}}" class="btn btn-success">Add New Healthcare Centre</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Centre Name</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Operational Day</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Centre Name</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Operational Day</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($healthcare as $datahc)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$datahc->centreName}}</td>
                                    <td>{{$datahc->address}}</td>
                                    <td>{{$datahc->phone}}</td>
                                    <td>{{$datahc->optDay}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
    <!-- /.container-fluid -->
@endsection
