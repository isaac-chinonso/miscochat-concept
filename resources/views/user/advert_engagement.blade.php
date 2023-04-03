@extends('layout.userapp')
@section('title')
Advertise || Miscochat Concept
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
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            @include('include.success')
            @include('include.warning')
            @include('include.error')
            <div class="account-card">
                <br>
                <h3 class="text-center">Advertise on Social Media</h3>
                <hr>
                <p style="font-size: 13px;">
                    Engagement tasks are created to get people to perform simple tasks for you on their social media account and other related accounts. Check below to see the price of creating various engagement tasks:
                </p><br>
                <form method="post" action="{{ url('/user/save-advert-engagement') }}">
                    @csrf
                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
                        <div class="col">
                            <label style="font-size: 13px;"> Select Platform </label><br>
                            <small style="font-size: 9px;">Please select the platform you want us to perform this action</small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control input-group-text"><i class="fa fa-bars"></i></span>
                                </div>
                                <select class="form-control" name="platform">
                                    <option selected disabled>✔ Select Plaform</option>
                                    <hr>
                                    <option value="Instagram, Twitter, Tiktok Follower"> Instagram, Twitter, Tiktok Follower</option>
                                    <option value="Facebook, Instagram, Twitter, Tiktok Likes">Facebook, Instagram, Twitter, Tiktok Likes</option>
                                    <option value="Audiomack Follower">Audiomack Follower</option>
                                    <option value="Facebook, Instagram, Twitter, Tiktok Comments">Facebook, Instagram, Twitter, Tiktok Comments </option>
                                    <option value="Youtube Subscribers">Youtube Subscribers</option>
                                    <option value="Youtube Views, likes and comments">Youtube Views, likes and comments</option>
                                    <option value="Playstore download and review">Playstore download and review</option>
                                    <option value="Facebook Share">Facebook Share</option>
                                    <option value="Twitter Retweet">Twitter Retweet</option>
                                    <option value="Whatsapp Whatsapp Group Member">Whatsapp Whatsapp Group Member</option>
                                    <option value="Telegram Telegram Group/Channel Member">Telegram Telegram Group/Channel Member</option>
                                    <option value="Apple Store Download and Review">Apple Store Download and Review</option>

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group typegroup">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                            <div class="col">
                                <label style="font-size: 13px;">Total No of Advert Posts </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control input-group-text"><i class="fa fa-bars"></i></span>
                                    </div>
                                    <input type="text" class="form-control quantity" name="quantity" placeholder="e.g 100, 500" value="">
                                    <small style="font-size: 9px;">This is the total number of people that will share your advert on their social media account.</small>
                                </div>

                            </div>
                            <div class="col">
                                <label style="font-size: 13px;"> Select Package </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control input-group-text"><i class="fa fa-bars"></i></span>
                                    </div>
                                    <select class="form-control summable" name="package">
                                        <option selected disabled>✔ Select Package</option>
                                        <hr>
                                        <option value="5.00">Instagram, Twitter, Tiktok - ₦5 Per Follow</option>
                                        <option value="5.00">Facebook, Instagram, Twitter, Tiktok - ₦5 Per Likes</option>
                                        <option value="20.00">Audiomack - ₦20 per follower</option>
                                        <option value="30.00">Facebook, Instagram, Twitter, Tiktok - ₦30 Per Comments</option>
                                        <option value="50.00">Youtube - ₦50 Per Subscriber</option>
                                        <option value="50.00">Youtube - ₦50 Per View, likes and comments</option>
                                        <option value="50.00">Playstore - ₦50 Per download and review</option>
                                        <option value="100.00">Facebook - ₦100 Per Share</option>
                                        <option value="100.00">Twitter - ₦100 Per Retweet</option>
                                        <option value="100.00">Whatsapp - ₦100 Per Whatsapp Group Member</option>
                                        <option value="100.00">Telegram - ₦100 Per Telegram Group/Channel Member</option>
                                        <option value="100.00">Apple Store - ₦100 Per Download and Review</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                            <div class="col">
                                <label style="font-size: 13px;"> Select Gender </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control input-group-text"><i class="fa fa-bars"></i></span>
                                    </div>
                                    <select class="form-control" name="gender">
                                        <option selected disabled>✔ Select Gender</option>
                                        <hr>
                                        <option value="all-gender">All Gender</option>
                                        <hr>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <small style="font-size: 9px;">You can select the kind of gender whether male or female that you want to post your adverts.</small>
                                </div>
                            </div>
                            <div class="col">
                                <label style="font-size: 13px;"> Select Religion </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control input-group-text"><i class="fa fa-bars"></i></span>
                                    </div>
                                    <select class="form-control" name="religion">
                                        <option selected disabled>✔ Select Religion</option>
                                        <hr>
                                        <option value="all-religion">All Religion</option>
                                        <hr>
                                        <option value="Christainity">Christainity</option>
                                        <option value="Islamic">Islamic</option>
                                    </select>
                                    <small style="font-size: 9px;">You can target people of a particular religion or Belief. Your advert will be posted by the religion you select.</small>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                            <div class="col">
                                <label style="font-size: 13px;"> Select Location </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control input-group-text"><i class="fa fa-bars"></i></span>
                                    </div>
                                    <select class="form-control" name="location">
                                        <option selected disabled>✔ Select Location</option>
                                        <hr>
                                        <option value="All Nigeria">All Nigeria</option>
                                        <hr>
                                        <option value="Abia">Abia</option>
                                        <option value="Adamawa">Adamawa</option>
                                        <option value="Akwa-ibom">Akwa Ibom</option>
                                        <option value="Anambra">Anambra</option>
                                        <option value="Bauchi">Bauchi</option>
                                        <option value="Bayelsa">Bayelsa</option>
                                        <option value="Benue">Benue</option>
                                        <option value="Borno">Borno</option>
                                        <option value="cross-river">Cross River</option>
                                        <option value="Delta">Delta</option>
                                        <option value="Ebonyi">Ebonyi</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Enugu">Enugu</option>
                                        <option value="fct">Federal Capital Territory</option>
                                        <option value="Gombe">Gombe</option>
                                        <option value="Imo">Imo</option>
                                        <option value="Jigawa">Jigawa</option>
                                        <option value="Kaduna">Kaduna</option>
                                        <option value="Kano">Kano</option>
                                        <option value="Kastina">Kastina</option>
                                        <option value="Kebbi">Kebbi</option>
                                        <option value="Kogi">Kogi</option>
                                        <option value="Kwara">Kwara</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nassarawa">Nassarawa</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Whatsapp">Oyo</option>
                                        <option value="Plateau">Plateau</option>
                                        <option value="Rivers">Rivers</option>
                                        <option value="Sokoto">Sokoto</option>
                                        <option value="Taraba">Taraba</option>
                                        <option value="Yobe">Yobe</option>
                                        <option value="Zamfara">Zamfara</option>
                                    </select>
                                    <small style="font-size: 9px;">You can target and select a particular location where your task or advert will be mostly shown.</small>
                                </div>
                            </div>
                            <div class="col">
                                <label style="font-size: 13px;"> Enter Your Link </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control input-group-text"><i class="fa fa-bars"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="image">
                                    <small style="font-size: 9px;">Enter Platform Link to engagement. People will click on this link to be able to carry out given task</small>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
                            <div class="col">
                                <label style="font-size: 13px;"> Enter Advert Text or Caption </label>
                                <textarea class="form-control" name="caption"></textarea>
                                <small style="font-size: 9px;">Please enter the advert text of caption. The caption should be well detailed. You can also include a link to your website, a phone number for people to contact you or any information you want people to see on on your advert.</small>
                            </div>
                        </div><br><br>
                        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                            <div class="col">
                                <h5>You will Pay: ₦<input id="sum" type="text" name="amount" /></h5>
                            </div>
                            <div class="col" align="right">
                                <button class="btn btn-inline" type="submit" style="padding: 7px 8px 7px 8px;font-size:13px;">Submit and Make Payment</button>
                            </div>
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
</div>
<hr>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>
    total = function() {
        $('form').change(function() {
            var total = 0;
            $(".summable").each(function() {
                total += parseFloat($(this).val() * $(this).closest(".typegroup").find(".quantity").val());
            });
            $("#sum").val(total)
        });
    }
    $(document).ready(function() {
        total();
    });
</script>
@endsection