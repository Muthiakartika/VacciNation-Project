@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Register Healthcare Administrator </h1>

            <!-- Record DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Register Healthcare Admin-->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Form Add Healthcare Administrator</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST"  action="{{route('register-adminhc.store')}}">
                                @csrf

                                <div class="form-group">
                                    <label for="centreName">Healthcare Centre <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control form-control-user @error('centreName')
                                        is-invalid @enderror"  name="centreName" onchange="showDiv(this)">
                                        <option value="#" disabled selected>--- Healthcare Centre ---</option>
                                        @foreach($healthcare as $dataHc)
                                            @if($dataHc->centreName)
                                                <option value="{{$dataHc->centreName}}">{{$dataHc->centreName}}</option>
                                            @endif
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
                                        is-invalid @enderror" name="email" placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password<span class="text-danger">*</span></label>
                                    <input id="password" type="password" class="form-control form-control-user @error('password')
                                        is-invalid @enderror" name="password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{{route('register-adminhc.index')}}">Back</a>
                                    <input class="btn btn-success" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- /.container-fluid -->
@endsection

