@extends('layouts.auth')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

                                <input name="role" value="Patient" type="hidden">

                                <div class="form-group">
                                    <label for="nin" class="col-form-label ">{{ __('NIN / Passport Number') }}</label>
                                    <input id="nin" type="text" class="form-control form-control-user @error('nin')
                                        is-invalid @enderror" name="nin">

                                    @error('nin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Full Name') }}</label>
                                    <input id="name" type="text" class="form-control form-control-user @error('name')
                                        is-invalid @enderror" name="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-form-label text-md-end">{{ __('Address') }}</label>
                                    <input id="address" type="text" class="form-control form-control-user @error('address')
                                        is-invalid @enderror" name="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <input id="phone" type="number" class="form-control form-control-user @error('phone')
                                        is-invalid @enderror" name="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dob" class=" col-form-label text-md-end">{{ __('Date of Birth') }}</label>
                                    <input id="dob" type="date" class="form-control form-control-user @error('dob')
                                        is-invalid @enderror" name="dob">

                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-end">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control form-control-user @error('email')
                                        is-invalid @enderror" name="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control form-control-user @error('password')
                                            is-invalid @enderror" name="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control form-control-user
                                            @error('password-confirm') is-invalid @enderror" name="password_confirmation">
                                        @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-success btn-user btn-block">
                                    {{ __('Register Account') }}
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-success" href="{{('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
