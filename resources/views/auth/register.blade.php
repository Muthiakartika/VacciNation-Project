<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" href="{{asset('admin/img/favicon2.png')}}" type="img/png">
    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-success">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf

                            <input name="role" value="Patient" type="hidden">

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input id="nin" type="text" class="form-control  @error('nin')
                                        is-invalid @enderror"  name="nin" value="{{old('nin')}}"
                                           maxlength="20" placeholder="{{ __('NIN / Passport Number') }}">

                                    @error('nin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input id="name" type="text" class="form-control @error('name')
                                        is-invalid @enderror" name="name" maxlength="255" value="{{old('name')}}" placeholder="{{ __('Full Name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input id="address" type="text" class="form-control @error('address')
                                    is-invalid @enderror" name="address" value="{{old('address')}}" placeholder="{{__('Address') }}">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="phone" type="number" class="form-control @error('phone')
                                is-invalid @enderror" name="phone" minlength="10" maxlength="15" value="{{old('phone')}}" placeholder="{{__('Phone Number')}}">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="dob" type="date" class="form-control  @error('dob')
                                    is-invalid @enderror" name="dob" value="{{old('dob')}}"
                                       placeholder="{{__('Date of Birth')}}" >

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control  @error('email')
                                    is-invalid @enderror" name="email" maxlength="255" value="{{old('email')}}"
                                       placeholder="{{__('Email')}}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password" type="password" class="form-control @error('password')
                                        is-invalid @enderror" name="password" minlength="8" maxlength="64" placeholder="{{__('Password')}}">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" minlength="8" maxlength="64" required autocomplete="new-password"
                                           placeholder="{{__('Confirm Passoword')}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="small text-success"  href="{{ route('password.request') }}">
                                    {{ __('Forgot Password') }}
                                </a>
                            </div>
                        @endif
                        <div class="text-center">
                            <a class="small text-success" href="{{'login'}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('admin/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.js')}}"></script>

{{--Date--}}
<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("dob")[0].setAttribute('max', today);
</script>

</body>

</html>
