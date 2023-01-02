@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h3 class="mb-2 text-black">Reset Healthcare Administrator Password</h3>
        <!-- Record DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Detail Personal Data</h6>
            </div>
            <div class="card-body">
                <!-- Register Healthcare Admin-->
                <form method="POST" action="{{route('admin-healthcare.update-password', $healthcareAdmin->id)}}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control form-control-user" name="email" value="{{$healthcareAdmin->email}}" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input id="password" type="password" class="form-control form-control-user @error('password')
                            is-invalid @enderror" name="password" minlength="8" maxlength="64" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password<span class="text-danger">*</span></label>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" minlength="8" maxlength="64"
                               placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <a class="btn btn-primary" href="{{route('admin-healthcare.reset-index')}}">Back</a>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

