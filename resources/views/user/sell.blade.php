@extends('layout.userapp')
@section('title')
Sell || Miscochat Concept
@endsection
@section('content')

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="account-card">
                    <img src="../assetsuser/images/sell.jpg" class="img-thumbnail" alt="product">
                    <h3 class="account-title">Sell Anything Faster on Miscochat Market </h3>
                    <p style="font-size: 14px;">
                        You can now advertise and place your products/services in the front of
                        thousands of people that use our website app everyday.
                    </p><br>
                    <div class="alert alert-info" role="alert" style="padding: 15px;border-radius:7px;">
                        <h5 align="left">ADVERT DURATION: 1 MONTH</h5>
                        <p align="left" style="line-height: 30px;font-size:14px;">Please note that your advert will be visible on the website
                            within a period of <strong>1 Month</strong>. You have to buy and place another
                            advert after one month if you want your advert to remain visible.</p>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col-md-6"><br>
                            <h6>Advert Fee: #1,000</h6>
                        </div>
                        <div class="col-md-6" align="right">
                            <button class="btn btn-inlin" style="padding: 7px 8px 7px 8px;"><a href="{{ url('/user/post-product') }}">Continue</a></button>
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
</section>

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
                        <p>Earn an instant refferal commision of N500 when you refer someone to become a member on Miscokit. The more you refer, the more you earn. Click here to view how refferal works.</p>
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