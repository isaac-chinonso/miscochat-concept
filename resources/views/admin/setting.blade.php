@extends('layout.adminapp')
@section('title')
Update Password || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Update Password</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Settings</li>
                                <li class="breadcrumb-item active" aria-current="page">Password</li>
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
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('user.update-password') }}">
                                    @csrf
                                    <div>
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control" name="current_password" id="current_password">
                                    </div><br>
                                    <div>
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div><br>
                                    <div>
                                        <label for="password_confirmation">Confirm New Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                    </div><br>
                                    <button class="btn btn-info" type="submit">Update Password</button>
                                </form>

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