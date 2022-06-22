@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Record New Vaccine batch</h1>
        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif

        <!-- Record DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Record batch -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Form Record New batch</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('record-batch.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="vaccineName">Vaccine Type<span class="text-danger">*</span></label>
                                <select type="text" class="form-control form-control-user  @error('vaccineName') is-invalid @enderror"
                                        name="vaccineName" onchange="showDiv(this)">
                                    <option value="#" disabled selected>--- Vaccine Type ---</option>
                                    @foreach($vaccine as $dataVaccine)
                                        @if($dataVaccine->vaccineName)
                                            <option value="{{$dataVaccine->vaccineName}}">{{$dataVaccine->vaccineName}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('vaccineName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            @foreach ($healthcare as $healthcareName)
                                @if($healthcareName->centreName=\Illuminate\Support\Facades\Auth::user()->centreName)
                                    <input class="form-control" type="hidden" name="centreName" id="centreName"
                                           value="{{$healthcareName->centreName}}">
                                @endif
                            @endforeach
                            <div class="form-group">
                                <label>Batch No<span class="text-danger">*</span></label>
                                <input class="form-control @error('batchNo') is-invalid @enderror" type="text"
                                       name="batchNo">
                                @error('batchNo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Expiry Date<span class="text-danger">*</span></label>
                                <input class="form-control @error('expiryDate') is-invalid @enderror" type="date"
                                       name="expiryDate">
                                @error('expiryDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Quantity Available<span class="text-danger">*</span></label>
                                <input class="form-control  @error('qtyAvailable') is-invalid @enderror "type="number"
                                       name="qtyAvailable">
                                @error('qtyAvailable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <a class="btn btn-primary" href="{{route('record-batch.index')}}">Back</a>
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

