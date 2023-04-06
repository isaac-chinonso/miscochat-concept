@extends('layout.userapp')
@section('title')
My Task || Miscochat Concept
@endsection
@section('content')

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <h3 class="account-title">Perform Social Task and Earn </h3>
                    <p style="font-size: 14px;">You can earn constantly daily income by posting advert of various businesses and top brand on your social media accounts. To get started, simply click on any of the earning options shown below</p><br>
                    @if(Auth::user()->activated == 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 20px;border-radius:7px;">
                        Note that you must activate your account by paying a one-time membership fee of <strong>₦3,000</strong> before you can start earning. Click <a href="{{ url('/user/activate-account') }}">Here</a> to become a member today.
                    </div>
                    @endif
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
                    @if(Auth::user()->activated == 1)
                    <h3 class="account-title">Accepted Tasks </h3>
                    <div class="orderlist">
                        <div class="table-scroll table-responsive">
                            <table class="table table-stripped table-list">
                                <thead>
                                    <tr style="background-color: #5f04f6;">
                                        <th class="text-white" scope="col">#</th>
                                        <th class="text-white">platform</th>
                                        <th class="text-white">Amount to Earn</th>
                                        <th class="text-white">Description</th>
                                        <th class="text-white">Date</th>
                                        <th class="text-white">Status</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; ?>
                                    @foreach($tasks as $task)
                                    <tr>
                                        <td>
                                            <h6>{{ $number }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $task->order->platform }}</h6>
                                        </td>
                                        <th>{{ $task->order->userearn }}</th>
                                        <td>{{ $task->order->caption }}</td>
                                        <td>
                                            <h6>{{ $task->created_at->format('d M Y ') }}</h6>
                                        </td>

                                        <td>
                                            @if($task->accept_status == 0)
                                            <span class="badge bg-warning">Accepted</span>
                                            @elseif($task->accept_status == 1)
                                            <span class="badge bg-primary">Submitted</span>
                                            @elseif($task->accept_status == 2)
                                            <span class="badge bg-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($task->accept_status == 0)
                                            <button class="btn btn-primary" style="padding: 3px 6px 3px 6px;text-transform:capitalize;font-size:12px;"><a href="{{ route('usertask',$task->id) }}" class="text-white">Perform Task</a></button>
                                            @elseif($task->accept_status == 1)
                                            <span class="badge bg-primary">Submitted</span>
                                            @elseif($task->accept_status == 2)
                                            <span class="badge bg-success">Completed</span>
                                            @endif
                                            <!-- modal content -->
                                            <div id="responsive-modal2{{ $task->id }}" class="modal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Accept Task</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4><strong>Confirm </strong></h4>
                                                            <p>Are you sure you want to Accept {{ $task->order->platform }} {{ $task->order->package }} ( {{ $task->order->quantity }} ) Task</p>
                                                        </div>
                                                        <form method="post" action="{{ route('accepttask',$task->id) }}">
                                                            @csrf
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" style="padding: 7px 8px 7px 8px;font-size:12px;" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" style="padding: 7px 8px 7px 8px;font-size:12px;">Accept Task</a>
                                                            </div>
                                                        </form>
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
                    @endif
                </div>
            </div>

        </div>
    </div>
</section><br><br>

<section class="intro-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="intro-wrap">
                    <div class="intro-icon "><i class="fas fa-tasks "></i></div>
                    <div class="intro-content ">
                        <h5>Social task</h5>
                        <p> Earn steady daily figures by following, liking, commenting, sharing, retweeting or posting adverts for business on your social media. Click here to see what you will earn when you perform social task.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 ">
                <div class="intro-wrap ">
                    <div class="intro-icon "><i class="fas fa-user-plus "></i></div>
                    <div class="intro-content ">
                        <h5>Refferal commision</h5>
                        <p>Earn an instant refferal commision of N2000 when you refer someone to become a member on Miscokit. The more you refer, the more you earn. Click here to view how refferal works.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 ">
                <div class="intro-wrap ">
                    <div class="intro-icon "><i class="fas fa-rocket "></i></div>
                    <div class="intro-content ">
                        <h5>Social boost refferal commision</h5>
                        <p>Earn social boost of refferal commision of 20% of any amount paid when you refer someone to buy likes, followers, comments, shares, what'sApp post views, etc. Click here to learn how refferal works.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 ">
                <div class="intro-wrap ">
                    <div class="intro-icon "><i class="fas fa-signal "></i></div>
                    <div class="intro-content ">
                        <h5>Airtime/Data</h5>
                        <p>Buy airtime or data on Miscokit at cheapest rate and sell to friends and family at high prices. Click here to see how airtime and data works.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<hr>
@endsection