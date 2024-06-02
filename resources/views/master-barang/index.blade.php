@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <p class="mb-0">Your business dashboard template</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bordered Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Task</th>
                                    <th scope="col">Progress</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Air Conditioner</td>
                                    <td>
                                        <div class="progress" style="background: rgba(127, 99, 244, .1)">
                                            <div class="progress-bar bg-primary" style="width: 70%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Apr 20,2018</td>
                                    <td><span class="badge badge-primary">70%</span>
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
                                <tr>
                                    <td>Textiles</td>
                                    <td>
                                        <div class="progress" style="background: rgba(76, 175, 80, .1)">
                                            <div class="progress-bar bg-success" style="width: 70%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>May 27,2018</td>
                                    <td><span class="badge badge-success">70%</span>
                                    </td>
                                    <td><span><a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil color-muted"></i> </a><a
                                                href="javascript:void()" data-toggle="tooltip"
                                                data-placement="top" title="Close"><i
                                                    class="fa fa-close color-danger"></i></a></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Milk Powder</td>
                                    <td>
                                        <div class="progress" style="background: rgba(70, 74, 83, .1)">
                                            <div class="progress-bar bg-dark" style="width: 70%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>May 18,2018</td>
                                    <td><span class="badge badge-dark">70%</span>
                                    </td>
                                    <td><span><a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil color-muted"></i> </a><a
                                                href="javascript:void()" data-toggle="tooltip"
                                                data-placement="top" title="Close"><i
                                                    class="fa fa-close color-danger"></i></a></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vehicles</td>
                                    <td>
                                        <div class="progress" style="background: rgba(255, 87, 34, .1)">
                                            <div class="progress-bar bg-danger" style="width: 70%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Mar 27,2018</td>
                                    <td><span class="badge badge-danger">70%</span>
                                    </td>
                                    <td><span><a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil color-muted"></i> </a><a
                                                href="javascript:void()" data-toggle="tooltip"
                                                data-placement="top" title="Close"><i
                                                    class="fa fa-close color-danger"></i></a></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Boats</td>
                                    <td>
                                        <div class="progress" style="background: rgba(255, 193, 7, .1)">
                                            <div class="progress-bar bg-warning" style="width: 70%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Jun 28,2018</td>
                                    <td><span class="badge badge-warning">70%</span>
                                    </td>
                                    <td><span><a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil color-muted"></i> </a><a
                                                href="javascript:void()" data-toggle="tooltip"
                                                data-placement="top" title="Close"><i
                                                    class="fa fa-close color-danger"></i></a></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection