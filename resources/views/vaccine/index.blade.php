@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccines Table</h1>
        <p class="mb-4">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        </p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Vaccines</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{route('add-vaccine.create')}}" class="btn btn-outline-success">Add New Vaccine</a>
                        <br>
                        <br>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Manufacturer</th>
                                <th>Vaccine Name</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Manufacturer</th>
                                <th>Vaccine Name</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($vaccine as $dataVaccine)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$dataVaccine->manufacturer}}</td>
                                    <td>{{$dataVaccine->vaccineName}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $vaccine->links() !!}
                    </div>
                </div>
            </div>

    </div>
    <!-- /.container-fluid -->
@endsection
