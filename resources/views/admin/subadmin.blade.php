@extends('layout.adminapp')
@section('title')
Sub Admin || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Sub Admin</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Sub Admin</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                @include('include.success')
                    @include('include.warning')
                    @include('include.error')
                    <div class="box">
                        <div class="box-body">
                            <h4>List of Sub Admins</h4>
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped no-wrap product-order" data-page-size="10">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        @foreach($users as $use)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $use->username }}</td>
                                            <td>{{ $use->fname }} {{ $use->lname }}</td>
                                            <td>{{ $use->email }}</td>
                                            <td>{{ $use->phone }}</td>
                                            <td>Sub Admin</td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default{{ $use->id }}">Revoke Sub Admin</button>
                                            </td>
                                            <!-- modal Area -->
                                            <div class="modal fade" id="modal-default{{ $use->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Revoke Sub Admin</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4><strong>Confirm Action</strong></h4>
                                                            <p>Are you sure you want to Revoke <strong>{{ $use->username }}</strong> as Sub Admin </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('revokesubadmin',$use->id) }}" class="btn btn-primary float-right">Complete Action</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </tr>
                                        <?php $number++; ?>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

@endsection