@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                 <form action="{{route('barang.store')}}" method="post">
                    @csrf
                    <div class="table-responsive " >
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <tbody class="text-primary">
                                <tr>
                                    <td>Kode Barang</td>
                                    <td>
                                      <input type="text" required name="kode_barang" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>
                                      <input type="text" required name="nama_barang" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Satuan</td>
                                    <td>
                                      <input type="text" required name="satuan" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>QTY</td>
                                    <td>
                                      <input type="number" required name="qty" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>
                                      <input type="number" required name="harga" class="form-control">
                                    </td>
                                </tr>
                               
                            </tbody> 
                        </table><div ><button type="submit" class="btn btn-success">Simpan</button></div>
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection