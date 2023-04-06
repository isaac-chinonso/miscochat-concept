@extends('layout.userapp1')
@section('title')
Advert Task Progress || Miscochat Concept
@endsection
@section('content')

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <h3 class="account-title">
                        @if (date("H") < 12) Good morning, <span class="text-danger">{{ Auth::user()->username }}</span>
                            @elseif (date("H") >= 12 && date("H") < 16) Good afternoon, <span class="text-danger">{{ Auth::user()->username }}</span>
                                @elseif (date("H") >= 15 && date("H") < 24) Good evening, <span class="text-danger"> {{ Auth::user()->username }}</span>
                                    @endif
                    </h3>
                    <div class="my-wallet">
                        <p>Total Balance</p>
                        <h3>₦{{ $walletbalance }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('include.success')
                @include('include.warning')
                @include('include.error')
                <div class="account-card">
                    <h3 class="account-title">Lists of Users that accepted the task and performing </h3>
                    <div class="orderlist">
                        <div class="table-scroll table-responsive">
                            <table class="table table-stripped table-list">
                                <thead>
                                    <tr style="background-color: #5f04f6;">
                                        <th class="text-white" scope="col">#</th>
                                        <th class="text-white">Date</th>
                                        <th class="text-white" scope="col">Platform</th>
                                        <th class="text-white" scope="col">Users</th>
                                        <th class="text-white">Status</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; ?>
                                    @foreach($tasksprogress as $taskprog)
                                    <tr>
                                        <td>
                                            {{ $number }}
                                        </td>

                                        <td>
                                            {{ $taskprog->created_at->format('d M Y ') }}
                                        </td>
                                        <td>
                                            {{ $taskprog->order->platform }}
                                        </td>
                                        <td>
                                            {{ $taskprog->user->username }}
                                        </td>
                                        <td>
                                            @if($taskprog->accept_status == 1)
                                            <span class="badge bg-primary">Approved</span>
                                            @elseif($taskprog->accept_status == 0)
                                            <span class="badge bg-danger">Waiting Submission</span>
                                            @elseif($taskprog->accept_status == 2)
                                            <span class="badge bg-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($taskprog->accept_status == 0)
                                            <span class="badge bg-danger">Waiting Submission</span>
                                            @elseif($taskprog->accept_status == 1)
                                            <button class="btn btn-outline text-success" style="padding: 5px;font-size:10px;" data-toggle="modal" data-target="#responsive-modal2{{ $taskprog->id }}">Approve Submission</button><br>
                                            <button class="btn btn-outline" style="padding: 5px;margin-top:5px;font-size:10px;"><a href="{{ route('useradverttaskproof', $taskprog->user_id) }}">performance Proof</a></button>
                                            @elseif($taskprog->accept_status == 2)
                                            <button class="btn btn-outline" style="padding: 5px;margin-top:5px;font-size:10px;"><a href="{{ route('useradverttaskproof', $taskprog->user_id) }}">performance Proof</a></button>
                                            @endif
                                            <!-- modal content -->
                                            <div id="responsive-modal2{{ $taskprog->id }}" class="modal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Approve User Submission</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4><strong>Confirm User Submission as Completed</strong></h4>
                                                            <p>Are you sure you want to Confirm <strong>{{ $taskprog->user->username }}</strong> Submission of <strong>{{ $taskprog->order->platform }}</strong> Task as Completed</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="post" action="{{ route('userapprovetasksubmission',$taskprog->id) }}">
                                                                @csrf
                                                                <button type="button" class="btn btn-default" style="padding: 7px 8px 7px 8px;font-size:12px;" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" style="padding: 7px 8px 7px 8px;font-size:12px;">Approve Submission</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->
                                        </td>
                                    </tr>
                                    <?php $number++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>
<hr>
@endsection