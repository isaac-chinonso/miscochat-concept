@extends('layout.userapp')
@section('title')
Earn || Miscochat Concept
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
                    <h3>Earn</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('include.success')
            @include('include.warning')
            @include('include.error')
            <div class="account-card">
                <hr>
                <p style="font-size: 14px;">You can earn constantly daily income by posting advert of various businesses and top brand on your social media accounts. To get started, simply accept any of the below task options shown below</p><br>
                @if(Auth::user()->activated == 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 20px;border-radius:7px;">
                    Note that you must activate your account by paying a one-time membership fee of <strong>₦3,000</strong> before you can start earning. Click <a href="{{ url('/user/activate-account') }}">Here</a> to become a member today.
                </div>
                @else
                <div class="warpper">
                    <input class="radio" id="one" name="group" type="radio" checked>
                    <input class="radio" id="two" name="group" type="radio">
                    <div class="tabs">
                        <label class="tab" id="one-tab" for="one">ADVERTS TASKS</label>
                        <label class="tab" id="two-tab" for="two">ENGAGEMENT TASKS</label>
                    </div>
                    <div class="panels">
                        <div class="panel" id="one-panel">
                            <div class="panel-title"></div>
                            <p>Adverts tasks are created to get people to post your adverts on various social media platforms.</p>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
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
                                                            <th class="text-white">Accepted Users</th>
                                                            <th class="text-white">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $number = 1; ?>
                                                        @foreach($adverttasks as $task)
                                                        <?php $count = 0; ?>
                                                        @foreach($adverttaskscount as $adverttask)
                                                        @if($adverttask->order_id == $task->id)
                                                        <?php $count++; ?>
                                                        @endif
                                                        @endforeach
                                                        @if ($count >= $task->quantity)
                                                        @else
                                                        <tr>
                                                            <td>
                                                                <h6>{{ $number }}</h6>
                                                            </td>
                                                            <td>
                                                                <h6>{{ $task->platform }}</h6>
                                                            </td>
                                                            <th>{{ $task->userearn }}</th>
                                                            <td>{{ $task->caption }}</td>
                                                            <td>
                                                                <h6>{{ $task->created_at->format('d M Y ') }}</h6>
                                                            </td>

                                                            <td>
                                                                <?php $count = 0; ?>
                                                                @foreach($adverttaskscount as $adverttask)
                                                                @if($adverttask->order_id == $task->id)
                                                                <?php $count++; ?>
                                                                @endif
                                                                @endforeach
                                                                {{ $count }} / {{ $task->quantity }}
                                                            </td>
                                                            <td>
                                                                @if($task->user_id == Auth::user()->id)

                                                                @else
                                                                <button class="btn btn-success" data-toggle="modal" data-target="#responsive-modal2{{ $task->id }}" style="padding: 3px 6px 3px 6px;text-transform:capitalize;font-size:12px;">Accept</button>
                                                                @endif
                                                                <!-- Accept Task modal content -->
                                                                <div id="responsive-modal2{{ $task->id }}" class="modal">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="myModalLabel">Accept Task</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h4><strong>Confirm </strong></h4>
                                                                                <p>Are you sure you want to Accept {{ $task->platform }} Task</p>
                                                                            </div>
                                                                            <form method="post" action="{{ route('accepttask',$task->id) }}">
                                                                                @csrf
                                                                                <input type="hidden" name="order_id" value="{{ $task->id }}">
                                                                                <input type="hidden" name="buyer_id" value="{{ $task->user_id }}">
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
                                                        @endif
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel" id="two-panel">
                            <div class="panel-title"></div>
                            <p>
                                Engagement tasks are created to get people to perform simple tasks for you on their social media account.</p> <br>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
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
                                                            <th class="text-white">Accepted Users</th>
                                                            <th class="text-white">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $number = 1; ?>
                                                        @foreach($engagementtasks as $task)
                                                        <?php $count = 0; ?>
                                                        @foreach($adverttaskscount as $adverttask)
                                                        @if($adverttask->order_id == $task->id)
                                                        <?php $count++; ?>
                                                        @endif
                                                        @endforeach
                                                        @if ($count >= $task->quantity)
                                                        @else
                                                        <tr>
                                                            <td>
                                                                <h6>{{ $number }}</h6>
                                                            </td>
                                                            <td>
                                                                <h6>{{ $task->platform }}</h6>
                                                            </td>
                                                            <th>{{ $task->userearn }}</th>
                                                            <td>{{ $task->caption }}</td>
                                                            <td>
                                                                <h6>{{ $task->created_at->format('d M Y ') }}</h6>
                                                            </td>
                                                            <td>
                                                                <?php $count = 0; ?>
                                                                @foreach($adverttaskscount as $adverttask)
                                                                @if($adverttask->order_id == $task->id)
                                                                <?php $count++; ?>
                                                                @endif
                                                                @endforeach
                                                                {{ $count }} / {{ $task->quantity }}
                                                            </td>
                                                            <td>
                                                                @if($task->user_id == Auth::user()->id)

                                                                @else
                                                                <button class="btn btn-success" data-toggle="modal" data-target="#responsive-modal2{{ $task->id }}" style="padding: 3px 6px 3px 6px;text-transform:capitalize;font-size:12px;">Accept</button>
                                                                @endif
                                                                <!-- Accept Task modal content -->
                                                                <div id="responsive-modal2{{ $task->id }}" class="modal">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="myModalLabel">Accept Task</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h4><strong>Confirm </strong></h4>
                                                                                <p>Are you sure you want to Accept {{ $task->platform }} Task</p>
                                                                            </div>
                                                                            <form method="post" action="{{ route('accepttask',$task->id) }}">
                                                                                @csrf
                                                                                <input type="hidden" name="order_id" value="{{ $task->id }}">
                                                                                <input type="hidden" name="buyer_id" value="{{ $task->user_id }}">
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
                                                        @endif
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</div><br><br>
<hr>

@endsection