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

    <title>{{ config('app.name') }} - Reset Password</title>

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

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">{{ __('Reset Password') }}</h1>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert small alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="user" method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control form-control-user @error('password')
                                            is-invalid @enderror" name="password" placeholder="{{__('Password')}}">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control form-control-user"
                                                   name="password_confirmation" required autocomplete="new-password"
                                                   placeholder="{{__('Confirm Passoword')}}">
                                        </div>
                                        <button type="submit" class="btn btn-outline-success btn-user btn-block">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
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

</body>

</html>
