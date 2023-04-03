@extends('layout.master')
@section('title')
About us || Miscochat Concept
@endsection
@section('content')


<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="assets/img/breadcrumb/breadcurmb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content">
                        <h3 class="breadcrumb__title wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">About Miscochat
                        </h3>
                        <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                            <span><a href="#">Home</a></span>
                            <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                            <span>About us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- tp-about-area-start -->
    <div class="tp-about-us-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 wow tpfadeLeft" data-wow-duration=".7s" data-wow-delay=".5s">
                    <div class="ab-inner-content">
                        <h4 class="ab-title-xs mb-25">Perform Social Tasks and Earn</h4>

                        <div class="tp-inner-list">
                            <ul>
                                <li style="font-size: 14px;"><i class="far fa-check"></i> Earn daily income of up to ₦5,000 by following, liking, commenting, sharing, retweeting or posting adverts for businesses on your social media.</li>
                                <li style="font-size: 14px;"><i class="far fa-check"></i> Earn an Instant Referral Commission of ₦2000 when you refer someone to become a member on misco. The more you refer, the more you earn.
                                </li>
                                <li style="font-size: 14px;"><i class="far fa-check"></i> Sell Faster on misco. Let your products be seen by thousands of buyers and resellers daily.
                                </li>
                                <li style="font-size: 14px;"><i class="far fa-check"></i> Start Your Airtime/Data Business on misco. Buy Airtime or Data on misco at up to 10% - 50% Discount and Sell to friends and family at normal prices.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 wow tpfadeRight" data-wow-duration=".7s" data-wow-delay=".8s">
                    <div class="tp-ab-wrapper p-relative">
                        <div class="tp-ab-shape-one z-index-3">
                            <img src="assets/img/about/about-shape-1.png" alt="">
                        </div>
                        <div class="tp-ab-shape-two z-index-3">
                            <img src="assets/img/about/about-circle-shape.png" alt="">
                        </div>
                        <div class="">
                            <img src="assets/img/about/adban.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-about-area-end -->

    <!-- tp-counter-area-strat -->
    <div class="tp-counter-area" style="padding-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" align="center">
                    <img src="assets/img/googleplay.png">
                </div>
            </div><br>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".7s">
                    <div class="counter-item text-center">
                        <h4><span class="counter">5</span>+</h4>
                        <h3>Years of operation</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".9s">
                    <div class="counter-item text-center">
                        <h4><span class="counter">{{ $totalmembers }}</span>+</h4>
                        <h3>Specialist Member</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay="1s">
                    <div class="counter-item text-center">
                        <h4><span class="counter">10000</span>+</h4>
                        <h3>Advertisers</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-counter-area-end -->

</main>

@endsection