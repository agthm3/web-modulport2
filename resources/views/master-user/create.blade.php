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
                <div class="card-body">
                 <form action="{{route('user.register')}}" method="post">
                    @csrf
                    <div class="table-responsive " >
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <tbody class="text-primary">
                                <tr>
                                    <td>Nama</td>
                                    <td>
                                      <input type="text" required name="name" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                      <input type="text" required name="email" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>
                                      <input type="password" required name="password" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td>
                                      <input type="password" required name="password_confirmation" class="form-control">
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