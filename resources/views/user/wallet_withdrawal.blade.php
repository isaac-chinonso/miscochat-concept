@extends('layout.userapp')
@section('title')
Wallet Balance Withdrawal
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

                <br>
                <div class="account-card">
                    <h3 class="account-title">
                        @if (date("H") < 12) Good morning, <span class="text-danger">{{ Auth::user()->username }}</span>
                            @elseif (date("H") >= 12 && date("H") < 16) Good afternoon, <span class="text-danger">{{ Auth::user()->username }}</span>
                                @elseif (date("H") >= 15 && date("H") < 24) Good evening, <span class="text-danger"> {{ Auth::user()->username }}</span>
                                    @endif
                    </h3>
                    <div class="my-wallet">
                        <p>Wallet Balance</p>
                        <h3>₦{{ $walletbalance }}</h3>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="account-card">
                    <h3 class="account-title">Place Withdrawal</h3>
                    <p>Please Enter amount you want to withdraw from your wallet</p>
                    <h6>Minimum Withdrawal is ₦4000</h6>
                    <br>
                    <form method="post" action="{{ url('/user/withdraw') }}" class="wallet-form">
                        @csrf
                        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                            <div class="col">
                                <label>Amount (₦)<span class="text-danger">*</span></label>
                                <input type="text" name="amount" placeholder="₦0.00">
                            </div>
                            <div class="col">
                                <button type="submit" style="margin-top: 25px;">Withdraw</button>
                            </div>
                        </div>
                    </form><br>
                    <p style="font-size: 13px;">Please note that withdrawal takes between 24-48hrs to get credited into your registered bank account</p>
                </div>
                <div class="account-card">
                    <h3 class="account-title">My Withdrawal History </h3>
                    <div class="orderlist">
                        <div class="table-scroll table-responsive">
                            <table class="table table-stripped table-list">
                                <thead>
                                    <tr style="background-color: #5f04f6;">
                                        <th class="text-white" scope="col">#</th>
                                        <th class="text-white">Date</th>
                                        <th class="text-white">Amount</th>
                                        <th class="text-white">Status</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; ?>
                                    @foreach($transaction as $transact)
                                    <tr>
                                        <td>
                                            <h6>{{ $number }}</h6>
                                        </td>
                                        <td>{{ $transact->created_at->format('d M Y ') }}</td>
                                        <td>₦{{ number_format($transact->amount, 0, '.', ', ') }}</td>
                                        <td>
                                            @if($transact->status == 0)
                                            <span class="badge bg-danger">Awaiting Payment</span>
                                            @elseif($transact->status == 1)
                                            <span class="badge bg-success">Paid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-success" style="padding: 3px 6px 3px 6px;text-transform:capitalize;font-size:12px;">Pay Now</button>
                                            <button class="btn btn-danger" style="padding: 3px 6px 3px 6px;text-transform:capitalize;font-size:12px;">Delete</button>

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
            <div class="col-md-4">
                <section class="inner-section wallet-part">
                    <div class="container desktopshow">
                        <div class="account-card"><br>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div>
                                            <a href="# "><img src="../assetsuser/images/user.png" width="55px" height="50px" alt="user "></a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>{{ Auth::user()->fname }} {{ Auth::user()->lname }} </h6>
                                        <span style="font-size: 13px;" class="muted">@ {{ Auth::user()->username }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="../assetsuser/images/earn.png" width="50px" height="50px">
                                    </div>
                                    <div class="col-md-9">
                                        <a href="{{ url('/user/advertise') }}" style="font-size: 11px;">Earn daily by posting adverts of businesses and performing social tasks on your social media accounts</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="../assetsuser/images/social.jpg" width="50px" height="50px">
                                    </div>
                                    <div class="col-md-9">
                                        <a href="{{ url('/user/advertise') }}" style="font-size: 11px;">Get people to repost your adverts and perform social tasks for you on their social media pages.</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="../assetsuser/images/networks.png" width="50px" height="50px">
                                    </div>
                                    <div class="col-md-9">
                                        <a href="#" style="font-size: 11px;">Buy Airtime and Data and enjoy up to 3% - 10% Discount across all networks.</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="../assetsuser/images/market.png" width="50px" height="50px">
                                    </div>
                                    <div class="col-md-9">
                                        <a href="{{ url('/user/sell') }}" style="font-size: 11px;">Take advantage of our huge traffic and advertise anything on the Miscochat Market.</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</section>
<hr>
@endsection