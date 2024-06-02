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
                    <div class="col-lg-6"><a href="{{route('user.create')}}"><div class="btn btn-primary">+Tambah User</div></a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($allUser as $item)
                               <tr>
                                <td>{{$item->name}}</td>
                                <td>
                                  {{$item->email}}
                                </td>
                                <td>
                                  {{$item->role}}
                                </td>
                                <td>
                                    <span>
                                       
                                        <form action="{{route('user.delete', $item->id)}}" method="POST">
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