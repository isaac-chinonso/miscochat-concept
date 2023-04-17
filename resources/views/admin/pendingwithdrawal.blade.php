@extends('layout.adminapp')
@section('title')
Pending Withdrawal History || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Pending Withdrawal</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Withdrawal</li>
                                <li class="breadcrumb-item active" aria-current="page">Pending Withdrawal</li>
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
                                        @foreach($pendingwithdrawal as $transact)
                                        <tr>
                                            <td>
                                                <h6>{{ $number }}</h6>
                                            </td>

                                            <td>{{ $transact->user->username }}</td>
                                            <td>{{ $transact->created_at->format('d M Y ') }}</td>
                                            <td>₦{{ number_format($transact->amount,0,'.',',') }}</td>
                                            <td>{{ $transact->type }}</td>
                                            <td>
                                                @if($transact->status == 0)
                                                <span class="badge bg-danger">Pending</span>
                                                @elseif($transact->status == 1)
                                                <span class="badge bg-success">Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#activate{{ $transact->id }}"> Approve </button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#decline{{ $transact->id }}"> Decline </button>
                                            </td>
                                            <!--Approve modal content -->
                                            <div id="activate{{ $transact->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Approve Withdrawal</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4><strong>Mark Withdrawal as Paid</strong></h4>
                                                            <p>Are you sure you want to Mark Withdrawal of <strong>₦{{ number_format($transact->amount,0,'.',',') }}</strong> from <strong>{{ $transact->user->username }}</strong> as Paid</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('adminapprovewithdrawal',$transact->id) }}" class="btn btn-success btn-sm waves-effect waves-light">Approve Withdrawal</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->
                                            <!--Decline modal content -->
                                            <div id="decline{{ $transact->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Decline Withdrawal</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4><strong>Decline  Withdrawal</strong></h4>
                                                            <p>Are you sure you want to Decline Withdrawal of <strong>₦{{ number_format($transact->amount, 0,'.',',') }}</strong> from <strong>{{ $transact->user->username }}</strong></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('admindeclinewithdrawal',$transact->id) }}" class="btn btn-danger btn-sm waves-effect waves-light">Decline Withdrawal</a>
                                                        </div>
                                                    </div>
                                                </div>
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