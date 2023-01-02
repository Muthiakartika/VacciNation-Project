@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h3 class="mb-2 text-black">Update Patient Profile</h3>
        <!-- Record DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Detail Personal Data</h6>
            </div>
            <div class="card-body">
                <!-- Register Healthcare Admin-->
                <form method="POST" action="{{route('patient-bio.update', $dataPatient->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group ">
                        <label for="name">NIN/IC Passport</label>
                        <input id="name" type="text" class="form-control form-control-user"
                               name="nin" value="{{$dataPatient->nin}}" readonly>
                    </div>

                    <div class="form-group ">
                        <label for="name">Full Name</label>
                        <input id="name" type="text" class="form-control form-control-user @error('name')
                            is-invalid @enderror" name="name" value="{{$dataPatient->name}}" placeholder="Full Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="name">Email</label>
                        <input id="name" type="text" class="form-control form-control-user"
                               name="email" value="{{$dataPatient->email}}" readonly>
                    </div>

                    <div class="form-group" hidden>
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control form-control-user" name="password"
                               value="{{$dataPatient->password}}">
                    </div>

                    <div class="form-group ">
                        <label for="name">Date of Birth<span class="text-danger">*</span></label>
                        <input id="name" type="date" class="form-control form-control-user @error('dob')
                            is-invalid @enderror" name="dob" value="{{$dataPatient->dob}}" placeholder="Full Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="name">Address</label>
                        <input id="name" type="text" class="form-control form-control-user @error('address')
                            is-invalid @enderror" name="address" value="{{$dataPatient->address}}" placeholder="Full Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="name">Phone Number</label>
                        <input id="name" type="number" class="form-control form-control-user @error('phone')
                            is-invalid @enderror" name="phone" value="{{$dataPatient->phone}}" placeholder="Full Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Profile Picture</label>
                        <input type="hidden" name="oldImage" value="{{$dataPatient->profile_img}}">
                        @if($dataPatient->profile_img)
                            <img src="{{asset('storage/' .$dataPatient->profile_img)}}" class="img-preview
                            img-fluid mb-3 col-sm-5 d-block" style="height: 150px; width: 150px;" >
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @endif
                        <input class="form-control-file @error('profile_img') is-invalid @enderror"
                               type="file" name="profile_img" id="image" onchange="previewImage()">

                        @error('profile_img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <a class="btn btn-primary" href="{{route('patient-bio.index')}}">Back</a>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        // Displaying preview image
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
    <!-- /.container-fluid -->
@endsection

