@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add New Healthcare Centre</h1>
        <!-- Record DataTales Example -->
        <div class="card shadow mb-4">
                <!-- Add Healthcare-->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Form Data</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('healthcare.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Centre Name<span class="text-danger">*</span></label>
                        <input class="form-control @error('centreName') is-invalid @enderror " type="text"
                               name="centreName">
                        @error('centreName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address<span class="text-danger">*</span></label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text" name="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone Number<span class="text-danger">*</span></label>
                        <input class="form-control @error('phone') is-invalid @enderror"
                               type="tel" min="1" name="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Operational Day<span class="text-danger">*</span></label>
                        <input class="form-control @error('optDay') is-invalid @enderror"
                               type="text" name="optDay">
                        @error('optDay')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Latitude<span class="text-danger">*</span></label>
                        <input class="form-control @error('latitude') is-invalid @enderror"
                               type="text"  name="latitude">
                        @error('latitude')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Longitude<span class="text-danger">*</span></label>
                        <input class="form-control @error('longitude') is-invalid @enderror"
                               type="text"  name="longitude">
                        @error('longitude')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Healthcare Center Image<span class="text-danger">*</span></label>
                        <img class="img-preview img-fluid mb-3">
                        <input class="form-control-file @error('img') is-invalid @enderror"
                               type="file" id="image" name="img" onchange="previewImage()">
                        @error('img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <a class="btn btn-primary" href="{{route('healthcare.index')}}">Back</a>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

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
