@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Batch Table</h1>

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Batch</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{route('record-batch.create')}}" class="btn btn-outline-success">Record New Batch</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Batch No</th>
                                    <th>Expiry Date</th>
                                    <th>Quantity Available</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Batch No</th>
                                    <th>Expiry Date</th>
                                    <th>Quantity Available</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($batch as $dataBatch)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$dataBatch->batchNo}}</td>
                                        <td>{{$dataBatch->expiryDate}}</td>
                                        <td>{{$dataBatch->qtyAvailable}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
    </div>
    <!-- /.container-fluid -->
@endsection
