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
            @foreach( $admin as $healthcareAdmin)
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'HealthcareAdmin'
                    and \Illuminate\Support\Facades\Auth::user()->name == $healthcareAdmin->name )
                    @if($healthcareAdmin->profile_img)
                        <img src="{{asset('storage/'.$healthcareAdmin->profile_img)}}" class="card-img-top img-fluid" alt="...">
                    @else
                        <img src="{{asset('admin/img/admin-logo3.png')}}" class="card-img-top img-fluid" alt="...">
                    @endif
                    <hr>
                    <div class="card-body">
                        <h5 class="text-capitalize text-center text-dark">{{$healthcareAdmin->name}}</h5>
                        <p class="card-text text-md-center text-dark">{{$healthcareAdmin->email}} </p>
                        <hr>
                        <a href="{{route('admin-healthcare.edit', $healthcareAdmin->id)}}"
                           class="btn btn-outline-success btn-sm">{{__('profile update')}}</a>
                        <a href="{{route('admin-healthcare.reset-password', $healthcareAdmin->id)}}"
                           class="btn btn-outline-success btn-sm">{{__('change password')}}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

