@extends('layout.adminapp2')
@section('title')
Allocated Users || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Allocated Users</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Allocation</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div align="right">
                    <button class="btn btn-sm btn-info"><a href="{{ url('/admin/task') }}" class="text-white"> Back to Task</a></button>
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
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Username</th>
                                            <th>Task</th>
                                            <th>Earned</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        @foreach($tasks as $cop)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $cop->user->username }}</td>
                                            <td>{{ $cop->order->platform }} {{ $cop->order->package }} ( {{ $cop->order->quantity }} ) </td>
                                            <td>₦{{ $cop->order->userearn }} </td>
                                            <td>
                                                @if($cop->accept_status == 1)
                                                <span class="badge bg-primary">Submitted</span>
                                                @elseif($cop->accept_status == 0)
                                                <span class="badge bg-warning">Accepted</span>
                                                @elseif($cop->accept_status == 2)
                                                <span class="badge bg-success">Completed</span>
                                                @endif
                                            </td>
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