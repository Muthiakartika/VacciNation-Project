@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Healthcare Administrator Table</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Healthcare Administrator Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{route('register-adminhc.create')}}" class="btn btn-outline-success">Register Healthcare Administrator</a>
                    <br>
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Healthcare Centre</th>
                            <th>Full Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Healthcare Centre</th>
                            <th>Full Name</th>
                            <th>Email</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach( $healthcareAdmin as $dataadmin)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$dataadmin->centreName}}</td>
                                <td>{{$dataadmin->name}}</td>
                                <td>{{$dataadmin->email}}</td>
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

