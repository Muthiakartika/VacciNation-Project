@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User Profile</h1>

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

        <div class="card text-center " style="width: 18rem;">
            @foreach( $dataPatient as $patient)
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'Patient'
                    and \Illuminate\Support\Facades\Auth::user()->name == $patient->name )
                    @if($patient->profile_img)
                        <img src="{{asset('storage/'.$patient->profile_img)}}" class="card-img-top img-fluid" alt="...">
                    @else
                        <img src="{{asset('admin/img/admin-logo3.png')}}" class="card-img-top img-fluid" alt="...">
                    @endif
                    <hr>
                    <div class="card-body">
                        <h5 class="text-capitalize text-center text-dark">{{$patient->name}}</h5>
                        <p class="text-capitalize text-center text-dark">{{$patient->phone}}</p>
                        <p class="card-text text-md-center text-dark">{{$patient->email}} </p>
                        <hr>
                        <a href="{{route('patient-bio.edit', $patient->id)}}"
                           class="btn btn-outline-success btn-sm">{{__('profile update')}}</a>
                        <a href="{{route('patient-reset.edit', $patient->id)}}"
                           class="btn btn-outline-success btn-sm">{{__('change password')}}</a>
                    </div>
                @endif
            @endforeach
        </div>
{{--        <!-- DataTales Example -->--}}
{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-body">--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>No</th>--}}
{{--                            <th>NIN/IC Passport</th>--}}
{{--                            <th>Full Name</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Phone</th>--}}
{{--                            <th>Option</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tfoot>--}}
{{--                        <tr>--}}
{{--                            <th>No</th>--}}
{{--                            <th>NIN/IC Passport</th>--}}
{{--                            <th>Full Name</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Phone</th>--}}
{{--                            <th>Option</th>--}}
{{--                        </tr>--}}
{{--                        </tfoot>--}}
{{--                        <tbody>--}}
{{--                        @php--}}
{{--                            $i = 0;--}}
{{--                        @endphp--}}
{{--                        @foreach( $dataPatient as $patient)--}}
{{--                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Patient'--}}
{{--                                and \Illuminate\Support\Facades\Auth::user()->name == $patient->name )--}}
{{--                                <tr>--}}
{{--                                    <td>{{++$i}}</td>--}}
{{--                                    <td>{{$patient->nin}}</td>--}}
{{--                                    <td>{{$patient->name}}</td>--}}
{{--                                    <td>{{$patient->email}}</td>--}}
{{--                                    <td>{{$patient->phone}}</td>--}}
{{--                                    <td>--}}
{{--                                        <a class="btn btn-warning btn-sm" href="{{route('patient-bio.edit', $patient->id)}}"><i class="nav-icon fas fa-edit"></i></a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
    <!-- /.container-fluid -->
@endsection

