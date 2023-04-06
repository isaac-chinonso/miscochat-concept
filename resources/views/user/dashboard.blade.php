@extends('layout.userapp')
@section('title')
Dashboard || Miscochat Concept
@endsection
@section('content')


<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->activated == 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 20px;border-radius:7px;">
                    Account not Activated. to activate your account you must activate your account by paying a one-time membership fee of <strong>₦3,000</strong>. Click <a href="{{ url('/user/activate-account') }}">Here</a> to become a member today.
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('include.success')
                @include('include.warning')
                @include('include.error')
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
                    <div class="row row-cols-2 row-cols-md-4 row-cols-lg-4 row-cols-xl-4">
                        <div class="col">
                            <div class="wallet-card" style="background-color: #6864ed;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h2><i class="fa fa-list text-white"></i></h2>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-white">Task Earnings</p>
                                        <h3 class="text-white">₦{{ number_format($taskearning, 0, '.', ', ') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="wallet-card" style="background-color: #08b445;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h2><i class="fa fa-wallet text-white"></i></h2>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-white">Total Spent</p>
                                        <h3 class="text-white">₦{{ number_format($totalspent, 0, '.', ', ') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="wallet-card" style="background-color: #6ea6fa;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h2><i class="fa fa-share-square text-white"></i></h2>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-white">Total Referral</p>
                                        <h3 class="text-white">{{ $referrals }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="wallet-card" style="background-color: #f91934;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h2><i class="fa fa-tag text-white"></i></h2>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-white">Referral Earnings</p>
                                        <h3 class="text-white">₦{{ $referralearning }}</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="banner-btn" align="center">
                <h4 style="text-align:center;"><strong>Your Refferal ID: {{ Auth::user()->username }} </strong> </h4> <br>
                <a class="btn btn-inline" href="{{ url('/user/fund-wallet') }}"><i class="fas fa-credit-card"></i><span>FUND</span></a>
                <a class="btn btn-outline" href="{{ url('/user/place-withdrawal') }}"><i class="fa fa-wallet"></i><span>WITHDRAW</span></a>
            </div><br><br>
        </div>
    </div>
</div>
<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('include.success')
                @include('include.warning')
                @include('include.error')
                <div class="account-card">
                    <h3 class="account-title">My Tasks </h3>
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
                                    @foreach($tasks as $task)
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
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25"><a href="{{ route('userearn') }}" class="btn btn-outline"><i class="fas fa-eye"></i><span>See all Task</span></a></div>
            </div>
        </div>
    </div>
</section><br><br>

<section class="section recent-part ">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-12 ">
                <div class="section-heading ">
                    <h2>Our Marketplace</h2>
                    <p>Buy and Sell anything on Miscochat Marketplace</p>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @foreach($product as $prod)
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <a class="product-image" href="#"><img src="../product/{{ $prod->image }}" height="170px" alt="product"></a>

                    </div>
                    <div class="product-content">

                        <h6 class="product-name "><a href="#">{{ $prod->name }}</a></h6>
                        <h6 class="product-price"><span>₦{{ number_format($prod->price, 0, '.', ', ') }}</span></h6>
                        <a href="{{ route('userproductdetails', $prod->slug) }}" class="btn btn-outline" style="padding:7px 8px 7px 8px;font-size:12px;"><i class="fas fa-eye"></i>View Product</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="section-btn-25"><a href="#" class="btn btn-outline"><i class="fas fa-eye"></i><span>Load More Product</span></a></div>
        </div>
    </div>
</section>
<hr>
@endsection