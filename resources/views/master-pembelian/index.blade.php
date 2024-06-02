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
                    <div class="col-lg-6"><a href="{{route('pembelian.create')}}"><div class="btn btn-primary">+Tambah Pembelian</div></a></div>
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
                               @foreach ($allPembelian as $item)
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
                                       
                                        <form action="{{route('barang.delete', $item)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button><i
                                                class="fa fa-close color-danger"></i></button>
                                            {{-- <a href="" data-toggle="tooltip"
                                            data-placement="top" title="Close"></a> --}}
                                        </form>
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