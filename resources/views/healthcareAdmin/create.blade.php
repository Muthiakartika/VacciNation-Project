@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h3 class="mb-2 text-black">Register Healthcare Administrator </h3>
        <!-- Record DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Form Data</h6>
            </div>
            <div class="card-body">
                <!-- Register Healthcare Admin-->
                <form method="POST" action="{{route('admin-healthcare.store')}}">
                    @csrf
                    <input name="role" value="HealthcareAdmin" type="hidden">
                    <input name="email_verified_at" value="{{\Carbon\Carbon::now()->toDateTimeString()}}" hidden>

                    <div class="form-group">
                        <label for="centreName">Healthcare Centre <span class="text-danger">*</span></label>
                        <select type="text" class="form-control form-control-user @error('centreName')
                            is-invalid @enderror"  name="centreName">
                            <option disabled selected>Select Healthcare Centre</option>
                            @foreach($healthcare as $dataHc)
                                <option value="{{$dataHc->centreName}}">{{$dataHc->centreName}}</option>
                            @endforeach
                        </select>

                        @error('centreName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="name">Full Name<span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control form-control-user @error('name')
                            is-invalid @enderror" name="name" placeholder="Full Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input id="email" type="email" class="form-control form-control-user @error('email')
                            is-invalid @enderror" name="email" maxlength="255" placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                             </span>
                        @enderror
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
                               name="password_confirmation" minlength="8" maxlength="64" required
                               autocomplete="new-password" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <a class="btn btn-primary" href="{{route('admin-healthcare.index')}}">Back</a>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

