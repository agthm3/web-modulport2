@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('pembelian.create') }}">
                                <div class="btn btn-primary">+Tambah Pembelian</div>
                            </a>
                        </div>
                        <div class="col-lg-6" style="text-align: right;">
                            <button class="btn btn-secondary" onclick="$('#filterModal').modal('show')">Filter Rekap Pembelian</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h1>Riwayat Pembelian</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Total QTY</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allPembelian as $item)
                                <tr>
                                    <td>{{$item->kode_barang}}</td>
                                    <td>{{$item->satuan}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{ number_format($item->harga, 2) }}</td>
                                    <td>{{$item->created_at->format('d M Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for filter -->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('pembelian.rekap') }}" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Rekap Pembelian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="start_date">Dari Tanggal:</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Sampai Tanggal:</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
