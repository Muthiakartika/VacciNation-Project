@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccination Information</h1>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif ($message = Session::get('succes'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Vaccination ID</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Vaccination ID</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php
                             $num = 0;
                        @endphp
                        @foreach($dataVaccination as $vaccination)
                                <tr>
                                    <td>{{++$num}}</td>
                                    <td>{{$vaccination->patientName}}</td>
                                    <td>{{$vaccination->id}}</td>
                                    @php
                                        $date = \Carbon\Carbon::parse($vaccination->appointmentDate)->isoFormat('DD-MM-Y');
                                    @endphp
                                    <td>{{($date)}}</td>

                                    @if($vaccination->status == 'Pending')
                                        <td><p class="btn btn-outline-warning btn-sm">Pending</p></td>
                                    @elseif($vaccination->status == 'Confirm')
                                        <td><p class="btn btn-outline-success btn-sm">Confirm</p></td>
                                    @elseif($vaccination->status == 'Administered')
                                        <td><p class="btn btn-outline-primary btn-sm">Administered</p></td>
                                    @elseif($vaccination->status == 'Reject')
                                        <td><p class="btn btn-outline-danger btn-sm">Reject</p></td>
                                    @endif
                                    <td>
                                        @if($vaccination->status == 'Confirm')
                                            <a class="btn btn-success btn-sm" hidden href="{{route('manage-vaccination.confirm', $vaccination->id)}}" >Confirm</a>
                                            <a class="btn btn-danger btn-sm" hidden href="{{route('manage-vaccination.reject', $vaccination->id)}}" >Reject</a>
                                            <a class="btn btn-primary btn-sm" href="{{route('manage-vaccination.administered', $vaccination->id)}}">Administered</a>
                                        @elseif($vaccination->status == 'Administered')
                                            <a class="btn btn-success btn-sm" hidden href="{{route('manage-vaccination.confirm', $vaccination->id)}}" >Confirm</a>
                                            <a class="btn btn-danger btn-sm" hidden href="{{route('manage-vaccination.reject', $vaccination->id)}}" >Reject</a>
                                            <a class="btn btn-primary btn-sm" hidden href="{{route('manage-vaccination.administered', $vaccination->id)}}">Administered</a>
                                            <a class="btn btn-info btn-sm">No Option</a>
                                        @elseif($vaccination->status == 'Reject')
                                            <a class="btn btn-success btn-sm"  hidden href="{{route('manage-vaccination.confirm', $vaccination->id)}}" >Confirm</a>
                                            <a class="btn btn-danger btn-sm" hidden href="{{route('manage-vaccination.reject', $vaccination->id)}}" >Reject</a>
                                            <a class="btn btn-primary btn-sm" hidden href="{{route('manage-vaccination.administered', $vaccination->id)}}">Administered</a>
                                            <a class="btn btn-info btn-sm">No Option</a>
                                        @else
                                            <a class="btn btn-success btn-sm" href="{{route('manage-vaccination.confirm', $vaccination->id)}}" >Confirm</a>
                                            <a class="btn btn-danger btn-sm"  href="{{route('manage-vaccination.reject', $vaccination->id)}}" >Reject</a>
                                            <a class="btn btn-primary btn-sm" href="{{route('manage-vaccination.administered', $vaccination->id)}}">Administered</a>
                                        @endif
                                    </td>


                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

