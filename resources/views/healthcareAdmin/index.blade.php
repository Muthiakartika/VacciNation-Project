@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        @if(\Illuminate\Support\Facades\Auth::user()->role == 'SuperAdmin')
            <h1 class="h3 mb-2 text-gray-800">Healthcare Administrator</h1>
        @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'HealthcareAdmin')
            <h1 class="h3 mb-2 text-gray-800">Healthcare Administrator Profile</h1>
        @endif


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
                <a href="{{route('admin-healthcare.create')}}" class="btn btn-md btn-success">Register Healthcare Administrator</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                        @foreach( $admin as $healthcareAdmin)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$healthcareAdmin->centreName}}</td>
                                    <td>{{$healthcareAdmin->name}}</td>
                                    <td>{{$healthcareAdmin->email}}</td>
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

