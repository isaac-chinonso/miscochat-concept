@extends('layout.userapp')
@section('title')
Post Product || Miscochat Concept
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

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @include('include.success')
                @include('include.warning')
                @include('include.error')
                <div class="account-card">
                    <h3 class="account-title">Post Product on Miscochat Market </h3>
                    <form method="post" action="{{ url('/user/save-product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Product Category:</label>
                                    <select class="form-control" name="category_id">
                                        <option selected disabled>Select Category</option>
                                        @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                                <div class="col">
                                    <label>Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Brand <span class="text-danger">*</span></label>
                                    <input type="text" name="brand" class="form-control">
                                </div>
                            </div><br>
                            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                                <div class="col">
                                    <label>Price <span class="text-danger">*</span></label>
                                    <input type="text" name="price" class="form-control" placeholder="10000">
                                </div>
                                <div class="col">
                                    <label>Product Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div><br>
                            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                                <div class="col">
                                    <label>Sellers Location <span class="text-danger">*</span></label>
                                    <input type="text" name="location" class="form-control" value="{{ Auth::user()->location }}">
                                </div>
                                <div class="col">
                                    <label>Sellers Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                            </div><br>
                            <div align="center">
                                <button type="submit" class="btn btn-inline"> Post to Marketplace</button>
                            </div>
                        </div>
                    </form>
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
<hr>
@endsection