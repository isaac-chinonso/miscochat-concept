@extends('layout.adminapp')
@section('title')
Manual Withdrawal || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Manual Withdrawal</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Withdrawal</li>
                                <li class="breadcrumb-item active" aria-current="page">Manual Withdrawal</li>
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
                            <h2 class="text-center">Search Users</h2>
                            <form action="{{ route('searchwithdrawaluser') }}" method="GET">

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label> Enter User Email</label>
                                            <input type="text" class="form-control" name="query" placeholder="xxxxxxx@email.com">
                                        </div>
                                        <div class="form-group" align="right">
                                            <button class="btn btn-info" type="submit">Search User</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                            </form>

                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Task Earning Balance</th>
                                            <th>Referral Earning Balance</th>
                                            <th>Status</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($searchtrack) && count($searchtrack) > 0)
                                        @foreach($searchtrack as $user)
                                        <tr>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->fname }} {{ $user->lname }}</td>
                                            <td>{{ $user->wallet->first()->balance }}</td>
                                            <td>{{ $user->referralwallet->first()->balance }}</td>
                                            <td>
                                                @if($user->activated == 0)
                                                <span class="badge bg-danger">Not Activated</span>
                                                @elseif($user->activated == 1)
                                                <span class="badge bg-success">Activated</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn-info btn-sm" data-toggle="modal" data-target="#modal-default{{ $user->id }}">Tasks Withdrawal</button>
                                            </td>
                                            <td>
                                                <button class="btn-primary btn-sm" data-toggle="modal" data-target="#modal-default1{{ $user->id }}">Referral Withdrawal</button><br>
                                            </td>
                                            <!-- modal Area -->
                                            <div class="modal fade" id="modal-default{{ $user->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Task Earning Withdrawal</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form method="POST" action="{{ url('admin/task-earning-withdrawal') }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                                <label>Enter Amount</label>
                                                                <input type="text" name="amount" class="form-control">
                                                            </div>
                                                            <div class="modal-footer" align="right">
                                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Withdraw</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.Delete modal -->
                                            <!-- modal Area -->
                                            <div class="modal fade" id="modal-default1{{ $user->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Referral Earning Withdrawal</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form method="POST" action="{{ url('admin/referral-earning-withdrawal') }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                                <label>Enter Amount</label>
                                                                <input type="text" name="amount" class="form-control">
                                                            </div>
                                                            <div class="modal-footer" align="right">
                                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Withdraw</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.Delete modal -->
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7" class="text-center" style="font-size: 16px;">No Result Found</td>
                                        </tr>
                                        @endif

                                    </tbody>
                                </table><br>
                                <div align="center">
                                    <a href="{{ url('/admin/manual-deposit') }}" class="btn btn-info btn-sm">Clear Search Details</a>
                                </div>
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