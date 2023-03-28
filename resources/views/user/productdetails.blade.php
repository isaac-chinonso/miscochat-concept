@extends('layout.userapp1')
@section('title')
{{ $productdetails->name }}
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

<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="details-content">
                    <div class="details-gallery">
                        <div class="details-label-group"><label class="details-label new">new</label><label class="details-label off">-10%</label></div>
                        <ul class="details-preview">
                            <li><img src="../../product/{{ $productdetails->image }}" alt="product"></li>
                        </ul>
                    </div>
                    <h3 class="details-name"><a href="#">{{ $productdetails->name }}</a></h3>
                    <div class="details-meta">
                        <p>LOCATION:<span>{{ $productdetails->location }}</span></p>
                        <p>BRAND:<a href="#">{{ $productdetails->brand }}</a></p>
                    </div>
                    <h3 class="details-price"><span>₦{{ number_format($productdetails->price, 0, '.', ', ') }}</span></h3>
                    <p class="details-desc">{{ $productdetails->description }}</p>
                    <div class="details-list-group"><label class="details-list-title">Share:</label>
                        <ul class="details-share-list">
                            <li>
                                <a href="#" class="icofont-facebook" title="Facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="icofont-twitter" title="Twitter"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                        <div class="col">
                            <a class="btn btn-inline" href="tel:{{ $productdetails->phone }}" style="font-size: 13px;"><i class="fa fa-phone"></i> Call Seller</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-outline" href="#" style="font-size: 13px;"><i class="fa fa-user"></i> Whatsapp</a>
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
                                            <a href="# "><img src="../../assetsuser/images/user.png" width="55px" height="50px" alt="user "></a>
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
                                        <img src="../../assetsuser/images/earn.png" width="50px" height="50px">
                                    </div>
                                    <div class="col-md-9">
                                        <a href="{{ url('/user/advertise') }}" style="font-size: 11px;">Earn daily by posting adverts of businesses and performing social tasks on your social media accounts</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="../../assetsuser/images/social.jpg" width="50px" height="50px">
                                    </div>
                                    <div class="col-md-9">
                                        <a href="{{ url('/user/advertise') }}" style="font-size: 11px;">Get people to repost your adverts and perform social tasks for you on their social media pages.</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="../../assetsuser/images/networks.png" width="50px" height="50px">
                                    </div>
                                    <div class="col-md-9">
                                        <a href="#" style="font-size: 11px;">Buy Airtime and Data and enjoy up to 3% - 10% Discount across all networks.</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="../../assetsuser/images/market.png" width="50px" height="50px">
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