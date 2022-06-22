@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Healthcare Centre Table</h1>
        <p class="mb-4">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Data Healthcare Centre</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{route('add-healthcare.create')}}" class="btn btn-outline-success">Add New Healthcare Centre</a>
                    <br>
                    <br>
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
