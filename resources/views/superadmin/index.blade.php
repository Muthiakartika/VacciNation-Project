@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User Profile</h1>

        <div class="card text-center " style="width: 18rem;">
            @foreach( $dataSuper as $superAdmin)
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'SuperAdmin')
                    <img src="{{asset('admin/img/admin-logo3.png')}}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="text-capitalize text-center text-dark">{{$superAdmin->name}}</h5>
                        <p class="card-text text-md-center text-dark">{{$superAdmin->email}} </p>
                        <hr>
                        <a href="{{route('super-admins.edit', $superAdmin->id)}}"
                           class="btn btn-outline-success btn-sm">{{__('change password')}}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


