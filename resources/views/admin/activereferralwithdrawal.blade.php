@extends('layout.adminapp')
@section('title')
Active Referral Withdrawal || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Active Referral Withdrawal</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Withdrawal</li>
                                <li class="breadcrumb-item active" aria-current="page">Active Referral Withdrawal</li>
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
                            <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        @foreach($activewithdrawal as $transact)
                                        <tr>
                                            <td>
                                                <h6>{{ $number }}</h6>
                                            </td>

                                            <td>{{ $transact->user->username }}</td>
                                            <td>{{ $transact->created_at->format('d M Y ') }}</td>
                                            <td>₦{{ number_format($transact->amount, 0, '.', ', ') }}</td>
                                            <td>{{ $transact->type }}</td>
                                            <td>
                                                @if($transact->status == 0)
                                                <span class="badge bg-danger">Pending</span>
                                                @elseif($transact->status == 1)
                                                <span class="badge bg-success">Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default{{ $transact->id }}"> Approve </button>
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