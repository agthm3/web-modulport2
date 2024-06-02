@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rekap Pembelian Barang</h1>
    <div class="table-responsive">
        <table class="table" id="printableTable">
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
                    <td>{{ $purchase->nomor_pembelian }}</td>
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
    </div>
    <button onclick="printTable()" class="btn btn-primary">Print Tabel</button>
</div>

<script>
    function printTable() {
        var divToPrint = document.getElementById('printableTable');
        var newWin = window.open('', '_blank');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">' + divToPrint.outerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();}, 10);
    }
    </script>
    
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printableTable, #printableTable * {
                visibility: visible;
            }
            #printableTable {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border-collapse: collapse; /* Memastikan border tabel terlihat rapi */
            }
            #printableTable th, #printableTable td {
                border: 1px solid black;
                padding: 5px; /* Menambahkan padding untuk kejelasan */
            }
        }
        </style>
        
        
@endsection
