@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h3 class="mb-2 text-black">Update Healthcare Administrator Profile</h3>
        <!-- Record DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Detail Personal Data</h6>
            </div>
            <div class="card-body">
                <!-- Register Healthcare Admin-->
                <form method="POST" action="{{route('admin-healthcare.update', $healthcareAdmin->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="centreName">Healthcare Centre</label>
                        <input type="text" class="form-control " id="centreName"
                               name="centreName" value="{{$healthcareAdmin->centreName}}" readonly>
                    </div>

                    <div class="form-group ">
                        <label for="name">Full Name</label>
                        <input id="name" type="text" class="form-control form-control-user @error('name')
                            is-invalid @enderror" name="name" value="{{$healthcareAdmin->name}}" placeholder="Full Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control form-control-user" name="email" value="{{$healthcareAdmin->email}}" readonly>
                    </div>

                    <div class="form-group" hidden>
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control form-control-user" name="password"
                               value="{{$healthcareAdmin->password}}">
                    </div>

                    <div class="form-group">
                        <label>Profile Picture</label>
                        <input type="hidden" name="oldImage" value="{{$healthcareAdmin->profile_img}}">
                        @if($healthcareAdmin->profile_img)
                            <img src="{{asset('storage/' .$healthcareAdmin->profile_img)}}" class="img-preview
                            img-fluid mb-3 col-sm-4 d-block" style="width: 150px; height: 150px;">
                        @else
                            <img class="img-preview img-fluid mb-3">
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
                        <a class="btn btn-primary" href="{{route('admin-healthcare.reset-index')}}">Back</a>
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

