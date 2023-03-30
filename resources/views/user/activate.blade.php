@extends('layout.userapp')
@section('title')
Dashboard || Miscochat Concept
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
                    <div class="alert alert-info alert-dismissible fade show" role="alert" style="padding: 20px;border-radius:7px;">
                        You can activate your account using one of the two method listed below. Either by Entering coupon codes bought from one of our vendors or make a payment of ₦3000 to activate membership

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
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-6">
                <div class="account-card">
                    <h3 class="account-title">Activate By Coupon</h3>
                    <p style="font-size: 13px;">Enter Coupon Code below to activate your membership if already purchased or Make a deposit of <strong class="text-danger">₦3000</strong> to the company account details</p><br>
                    <h6><strong>1024859874</strong></h6>
                    <h6><strong>MISCOCHAT CONCEPT</strong></h6>
                    <h6><strong>UBA</strong></h6><br>
                    <p style="font-size: 13px;">After Successfull Payment, Kindly Send Proof of Payment to the Whatsapp link beow to get your coupon code</p><br>
                    <button class="btn btn-outline" style="padding: 4px 6px 4px 6px;"><a href="https://api.whatsapp.com/send?phone=2347026936724&text=Hello, my username is {{ Auth::user()->username }} , I just paid for coupon" target="_blank" style="color: #5f04f6;"><img src="../assetsuser/images/whatsapp.png" width="20px" height="20px"> Send Message</a></button><br><br>
                    <form method="post" action="{{ url('/user/activate-user') }}" class="wallet-form">
                        @csrf
                        <label>Coupon Code <span class="text-danger">*</span></label>
                        <input type="text" name="coupon_code" placeholder="AKST48A">
                        <button type="submit">Activate Account</button>
                    </form>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="account-card">
                    <h3 class="account-title">Make Payment</h3>
                    <p>Click the button below to make payment and activate your membership or Make a deposit of <strong class="text-danger">₦3000</strong> to the company account details</p><br>
                    <h6><strong>1024859874</strong></h6>
                    <h6><strong>MISCOCHAT CONCEPT</strong></h6>
                    <h6><strong>UBA</strong></h6><br>
                    <p style="font-size: 13px;">After Successfull Payment, Kindly Send Proof of Payment to the Whatsapp link beow to get activated</p><br>
                    <button class="btn btn-outline" style="padding: 4px 6px 4px 6px;"><a href="https://api.whatsapp.com/send?phone=2347026936724&text=Hello, my username is {{ Auth::user()->username }} , I just paid for membership activation" target="_blank" style="color: #5f04f6;"><img src="../assetsuser/images/whatsapp.png" width="20px" height="20px"> Send Message</a></button><br><br>
                    <form class="wallet-form">
                        <label>Amount</label>
                        <input type="text" name="" value="₦3000" disabled>
                        <button type="submit">Click here to Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
@endsection