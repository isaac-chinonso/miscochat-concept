@extends('layout.userapp')
@section('title')
Pay Order Fee || Miscochat Concept
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

                        <h4>Are you sure you want to fund wallet with {{ $payment->amount }}</h4>

                        <form method="post" action="{{ route('pay') }}" class="wallet-form">
                            @csrf
                            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                                <input type="hidden" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => Auth::user()->id,'firstname' => Auth::user()->firstname,'lastname' => Auth::user()->lastname,'phone' => Auth::user()->phone,]) }}">
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}{{ Auth::user()->lastname }}">
                                <div class="col">
                                    <label>Amount <span class="text-danger">*</span></label>
                                    <input type="text" name="amount" placeholder="₦0.00">
                                </div>
                                <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">
                                <div class="col">
                                    <button type="submit" style="margin-top: 25px;">Fund Wallet</button>
                                </div>
                            </div>
                        </form><br>
                    </div>
                </div>
            </div>
        </div>
</section>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="banner-btn" align="center">
                <a class="btn btn-inline" href="{{ url('/user/fund-wallet') }}"><i class="fas fa-credit-card"></i><span>FUND</span></a>
                <a class="btn btn-outline" href="{{ url('/user/place-withdrawal') }}"><i class="fa fa-wallet"></i><span>WITHDRAW</span></a>
            </div><br><br>
        </div>
    </div>
</div>


<hr>
@endsection