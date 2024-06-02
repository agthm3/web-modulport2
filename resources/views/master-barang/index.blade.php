@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <div class="col-lg-6"><a href="{{route('barang.create')}}"><div class="btn btn-primary">+Tambah Barang</div></a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Total QTY</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($allBarang as $item)
                               <tr>
                                <td>{{$item->kode_barang}}</td>
                                <td>
                                  {{$item->nama_barang}}
                                </td>
                                <td>{{$item->satuan}}</td>
                                <td>{{$item->qty}}
                                </td>
                                <td>
                                    {{$item->harga}}
                                </td>
                                <td>
                                    <span>
                                        <a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i
                                                class="fa fa-pencil color-muted"></i> </a>
                                        <a href="javascript:void()" data-toggle="tooltip"
                                            data-placement="top" title="Close"><i
                                                class="fa fa-close color-danger"></i></a>
                                    </span>
                                </td>
                            </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection