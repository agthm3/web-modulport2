@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rekap Pembelian Barang</h1>
    <table class="table">
        <thead>
            <tr>
                <th>NOMOR PO</th>
                <th>TANGGAL</th>
                <th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>SATUAN</th>
                <th>QTY</th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
            <tr>
                <td>{{ $purchase->nomor_po }}</td>
                <td>{{ $purchase->tanggal }}</td>
                <td>{{ $purchase->kode_barang }}</td>
                <td>{{ $purchase->nama_barang }}</td>
                <td>{{ $purchase->satuan }}</td>
                <td>{{ $purchase->qty }}</td>
                <td>{{ number_format($purchase->subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('pembelian.download', ['start_date' => request()->start_date, 'end_date' => request()->end_date]) }}" class="btn btn-success">Download PDF</a>
</div>
@endsection
