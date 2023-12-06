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
                </div>
            </div>
        </div>
</section>

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="account-card">
                    <h4 class="account-title">Choose your Withdrawal Option:</h4>
                    <p style="font-size: 14px;">Kindly Update your bank account details before placing withdrawal. to update your bank details click <a href="{{ url('user/bank') }}">here</a></p><br>
                    <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                        <div class="col">
                            <div class="panels" align="center">
                                <h6 style="color: black;font-size:12px;">Task Earnings</h6>
                                <img src="../assetsuser/images/wallet.png" width="50px" height="50px"><br>
                                <a href="#" style="font-size: 11px;">Place withdrawal from task earnings and fund deposit balance.</a><br>
                                <div class="my-wallet">
                                    <p style="font-size: 15px;">Task Earning <br class="mobileshow"> Balance</p>
                                    <h3 style="font-size: 18px;">₦{{ $walletbalance }}</h3>
                                </div>
                                <a href="{{ url('/user/place-Wallet-withdrawal') }}" class="btn btn-outlin" style="padding: 3px 8px 3px 8px;font-size:12px;">Continue</a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="panels" align="center">
                                <h6 style="color: black;font-size:12px;">Referral Earnings</h6>
                                <img src="../assetsuser/images/referral.png" width="50px" height="50px"><br>
                                <a href="#" style="font-size: 11px;">Place withdrawal from your Referral earnings Wallet balance.</a><br>
                                <div class="my-wallet">
                                    <p style="font-size: 15px;">Referral Earning Balance</p>
                                    <h3 style="font-size: 18px;">₦{{ $referralwalletbalance }}</h3>
                                </div>
                                <a href="{{ url('/user/place-referral-withdrawal') }}" class="btn btn-outlin" style="padding: 3px 8px 3px 8px;font-size:12px;">Continue</a>
                            </div>
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