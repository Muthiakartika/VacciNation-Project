@extends('layouts.app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Batch</h1>

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{route('batches.create')}}" class="btn btn-outline-success">Record New Batch</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
