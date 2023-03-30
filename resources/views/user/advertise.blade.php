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
                    <div class="my-wallet">
                        <p>Total Balance</p>
                        <h3>₦{{ $walletbalance }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="account-card">
                <br>
                <h3 class="text-center">Advertise on Social Media</h3>
                <hr>
                <p style="font-size: 13px;">
                    Get people with atleast 1000 active followers to repost your adverts and perform certain social tasks for you on their social media accounts. Select the type of task you want people to perform below:
                </p><br>
                <div class="warpper">
                    <input class="radio" id="one" name="group" type="radio" checked>
                    <input class="radio" id="two" name="group" type="radio">
                    <div class="tabs">
                        <label class="tab" id="one-tab" for="one">ADVERTS TASKS</label>
                        <label class="tab" id="two-tab" for="two">ENGAGEMENT TASKS</label>
                    </div>
                    <div class="panels">
                        <div class="panel" id="one-panel">
                            <div class="panel-title"></div>
                            <p>Adverts tasks are created to get people to post your adverts on various social media platforms. Below are the price of Advert tasks:</p>
                            <br>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/whatsapp.png" width="100px" height="100px"><br><br>

                                            <a href="{{ url('/user/social-buy') }}" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <h6>Get People to Post Your Adverts on their Whatsapp Status</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#100 per Whatsapp Status Advert Post</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get real people to post your Adverts on their whatsapp status. Each person will create two separate status posts with one post containing your advert image/video while the second post will contain ONLY your advert text or caption. A Whatsapp user may have over 100 views on their Whatsapp status.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/whatsapp.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/facebook.png" width="100px" height="100px"><br><br>

                                            <a href="{{ url('/user/social-buy') }}" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Post Your Adverts on Facebook</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#150 per Advert Post</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get people with atleast 1000 active friends or followers EACH on their Facebook Account to post your advert to their own audience. This will give your advert massive views within a short period of time. You can indicate any number of people you want to post your advert.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/facebook.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/instagram.jpg" width="100px" height="100px"><br><br>

                                            <a href="{{ url('/user/social-buy') }}" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Post Your Adverts on Instagram</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#150 per Advert Post</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get people with atleast 1000 active followers EACH on their Instagram Account to post your advert to their followers. This will give your advert massive views within a short period of time. You can indicate any number of people you want to post your advert on their page.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/instagram.jpg" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/twitter.png" width="100px" height="100px"><br><br>

                                            <a href="{{ url('/user/social-buy') }}" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Post Your Adverts on Twitter</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#150 per Advert Post</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get people with atleast 1000 active followers EACH on their Twitter Account to post your advert to their followers. This will give your advert massive views within a short period of time. You can indicate any number of people you want to post your advert.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/twitter.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/tiktok.png" width="100px" height="100px"><br><br>

                                            <a href="{{ url('/user/social-buy') }}" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Post Your Adverts on Tiktok</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#150 per Advert Post</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get people with atleast 1000 active followers EACH on their Tiktok Account to post your advert to their followers. This will give your advert massive views within a short period of time. You can indicate any number of people you want to post your advert.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/tiktok.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel" id="two-panel">
                            <div class="panel-title"></div>
                            <p>
                                Engagement tasks are created to get people to perform simple tasks for you on their social media account. Below are the prices of Engagement tasks: </p> <br>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/people.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <h6>Get People to Follow your Page on Social Media </h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#5 per Follow</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to follow your social media pages. You can get any number of people to follow your social media page. No social media login details required.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/instagram.jpg" width="15px" height="15px">&nbsp;<img src="../assetsuser/images/twitter.png" width="15px" height="15px">&nbsp;<img src="../assetsuser/images/tiktok.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/post.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Like your Social Media Posts</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#5 per Like</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to Like your social media posts. You can get any number of people to like your social media posts. No social media login detail is required. Simply enter your post link to get started</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/facebook.png" width="15px" height="15px">&nbsp;<img src="../assetsuser/images/instagram.jpg" width="15px" height="15px">&nbsp;<img src="../assetsuser/images/twitter.png" width="15px" height="15px">&nbsp;<img src="../assetsuser/images/tiktok.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/facebook.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get Real People to Follow and Like your Business Page</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#5 Per Page Like and Follow</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to Like and Follow Your Facebook Business Page. You can get any number of people to like and follow your facebook page. No Facebook Login Details is required.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/facebook.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/audiomack.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get Real People to Follow your Audiomack Channel</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#20 per Follower</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to Follow Your Audiomack Music Channel. You can get any number of people to follow your Audiomack Channel. No Audiomack Login Details is required.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/audiomack.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/comment.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get Real People to Comment on your Social Media Post</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#30 per Comment</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get Real People to Comment on your social media posts. We DO NOT allow fake users or bots to comment on posts.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/facebook.png" width="15px" height="15px">&nbsp;<img src="../assetsuser/images/instagram.jpg" width="15px" height="15px">&nbsp;<img src="../assetsuser/images/twitter.png" width="15px" height="15px">&nbsp;<img src="../assetsuser/images/tiktok.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/youtube.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Subscribe on your Youtube Channel</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#50 per Subscriber</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to Subcribe on your Youtube Channel. The users will subscribe on your channel thereby increasing your subscribers, views, comments and likes. You can get any number of persons to subscribe on your Youtube Channel. Simply enter your Youtube Channel Link to get started.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/youtube.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/youtube.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get Real People to View and Comment on your Youtube Channel and Video</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#50 per View, Like and Comment</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to View and Comment on your Youtube Channel and Video. The users will watch your video, comment on the video and like the video at the same time thereby increasing your views, comments and likes. You can get any number of people to view and comment on your video. Simply enter the Youtube Video Link to get started</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/youtube.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/playstore.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Download and Review your App on Google Playstore</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#50 per Download and Review</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to download and review your apps on Google Play Store. You can get any number of people to download and review your app. Simply enter your App download link to get started.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/playstore.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/share.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Share your Facebook Post</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#100 per Share</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to share your Facebook Posts to their friends. You can get any number of people to share your facebook post. Simply enter your facebook post link to get started</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/facebook.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/retweet.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Retweet your Twitter Post</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#100 per Retweet</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to Retweet your twitter posts to their own followers. You can get any number of people to retweet your twitter posts</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/twitter.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/whatsapp.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get Real People to Join your Whattsapp Group</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#100 per Whatsapp Group Member</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get People to Join Your Whatsapp Group today. You can get any number of people to join your Whatsapp Group. Your Whatsapp Login Details are not required. Simply enter the group link to get started.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/whatsapp.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/telegram.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get Real People to Join your Telegram Group/Channel</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#100 per Telegram Group/Channel Member</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get Real People to Join your Telegram Group today. You can get any number of people to join your Telegram Group/channel. No telegram login details required.</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/telegram.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div align="center">
                                            <img src="../assetsuser/images/apple-store.png" width="100px" height="100px"><br><br>

                                            <a href="#" class="btn btn-outlin" style="padding: 5px 35px 5px 35px;">Select</a><br class="mobileshow"><br class="mobileshow">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>Get People to Download and Review your App on Apple Store</h6>
                                        <span style="font-size: 13px;">Pricing: <strong>#100 per Download and Review</strong></span>
                                        <hr>
                                        <small style="font-size: 10px;line-height:3px;">Get people to download and review your apps on Apple Store. You can get any number of people you want to download and review your app. Simply enter the App Download Link to get started</small><br>
                                        <span style="font-size: 11px;">Platform: <img src="../assetsuser/images/apple-store.png" width="15px" height="15px"></span>
                                        <hr>
                                    </div>
                                </div>
                            </div>
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
<hr>
@endsection