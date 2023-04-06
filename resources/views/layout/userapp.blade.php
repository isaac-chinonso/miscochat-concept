<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="greeny">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>@yield('title')</title>
    <link rel="icon" href="../assetsuser/images/favicon.png">
    <link rel="stylesheet" href="../assetsuser/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="../assetsuser/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="../assetsuser/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="../assetsuser/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="../assetsuser/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="../assetsuser/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="../assetsuser/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assetsuser/css/main.css">
    <link rel="stylesheet" href="../assetsuser/css/index.css">
    <link rel="stylesheet" href="../assetsuser/css/wallet.css">
    <link rel="stylesheet" href="../assetsuser/css/profile.css">
    <link rel="stylesheet" href="../assetsuser/css/style.css">
    <link rel="stylesheet" href="css/orderlist.css">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Perform Social Tasks and Earn Steady Figures Daily, Online Reselling App, Sell Faster, Social Marketplace">
    <meta name="keywords" content="Miscochat, Perform Social Tasks and Earn Steady Figures Daily, Online Reselling App, Sell Faster, Social Marketplace">
    <meta name="author" content="Miscochat">

    <meta property="og:url" content="https://www.miscochat.ng/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Perform Social Tasks and Earn Steady Figures Daily" />
    <meta property="og:description" content="Earn steady daily income by performing social media tasks such as Following, Liking, Commenting, Sharing, Retweeting, App Reviews etc." />
    <meta property="og:image" content="https://miscochat.ng/assets/img/logo/logo1.png" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JNJ2P1BFBG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-JNJ2P1BFBG');
    </script>
</head>

<body>
    <div class="backdrop"></div>
    <a class="backtop fas fa-arrow-up" href="#"></a>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="header-top-welcome">
                        <p>Welcome to Miscochat Concept in Best Social Earning Platform!</p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-3">
                    <div class="header-top-select">
                        <div class="header-select"><a href="{{ url('/user/airtime-data-topup') }}" class="text-white"><i class="icofont-basket"></i>Airtime/Data Topup</a></div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-4">
                    <ul class="header-top-list">
                        <li>
                            <div class="header-top-select">
                                <div class="header-select">
                                    <i class="fa fa-credit-card"></i>
                                    <a href="{{ url('/user/bank') }}">Bank Details |</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="header-top-select">
                                <div class="header-select">
                                    <i class="fa fa-user"></i>
                                    <a href="{{ url('/user/profile') }}">Account |</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="header-top-select">
                                <div class="header-select">
                                    <a href="{{ url('/logout') }}">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group"><button class="header-user"><img src="../assetsuser/images/user.png" alt="user"></button>
                    <a href="{{ url('/user/dashboard') }}"><img src="../assetsuser/images/logo1.png" alt="logo"></a><button class="header-src"><i class="fas fa-search"></i></button>
                </div>
                <a href="{{ url('/user/dashboard') }}" class="header-logo"><img src="../assetsuser/images/logo1.png" alt="logo"></a>
                <a href="{{ url('/user/dashboard') }}" class="header-widget" title="My Account"><img src="../assetsuser/images/user.png" alt="user"><span>Welcome, {{ Auth::user()->username }}</span></a>
                <form class="header-form"><input type="text" placeholder="Search anything..."><button><i class="fas fa-search"></i></button></form>

            </div>
        </div>
    </header>
    <nav class="navbar-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-content">
                        <ul class="navbar-list">
                            <li class="navbar-item dropdown">
                                <a href="{{ url('/user/dashboard') }}"><i class="fa fa-home"></i></a>
                            </li>

                            <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown-arrow" href="#"><i class="fa fa-list"></i> Orders</a>
                                <ul class="dropdown-position-list">
                                    <li><a href="{{ url('/user/advert-task-orders') }}">Advert Task Order</a></li>
                                    <li><a href="{{ url('/user/engagement-task-orders') }}">Engagement Task Order</a></li>
                                </ul>
                            </li>

                            <li class="navbar-item dropdown-megamenu ">
                                <a href="{{ url('/user/accepted-task') }}"><i class="fa fa-list"></i> Accepted Task</a>
                            </li>

                            <li class="navbar-item dropdown-megamenu ">
                                <a href="{{ url('/user/fund-wallet') }}"><i class="fa fa-credit-card"></i> Fund wallet</a>
                            </li>

                            <li class="navbar-item dropdown-megamenu ">
                                <a href="{{ url('/user/transaction-history') }}"><i class="fa fa-list"></i> Transaction History</a>

                            </li>
                            <li class="navbar-item dropdown-megamenu ">
                                <a href="{{ url('/user/marketplace') }}"><i class="fa fa-shopping-basket"></i> Marketplace</a>
                            </li>
                            <li class="navbar-item dropdown-megamenu ">
                                <a href="{{ url('/user/earn') }}"><i class="fa fa-wallet"></i> Earn</a>
                            </li>
                            <li class="navbar-item dropdown-megamenu ">
                                <a href="{{ url('/user/product-list') }}"><i class="fa fa-shopping-basket"></i> Product</a>
                            </li>
                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info">
                                <button class="btn btn-inlin" data-toggle="modal" data-target="#exampleModalCenter" style="padding: 5px;color:#5f04f6;"><i class="fa fa-plus-circle" style="font-size: 15px;"></i>Advertise here</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Choose your advert Package below:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                        <div class="col">
                            <div class="panels" align="center">
                                <h6 style="color: black;font-size:12px;">Advertis on Misco Market</h6>
                                <img src="../assetsuser/images/market.png" width="50px" height="50px"><br>
                                <a href="#" style="font-size: 11px;">Take advantage of our huge traffic and advertise Anything on the Miscochat Marketplace.</a><br><br>
                                <a href="{{ url('/user/sell') }}" class="btn btn-outlin" style="padding: 3px 8px 3px 8px;font-size:12px;">Get Started</a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="panels" align="center">
                                <h6 style="color: black;font-size:12px;">Advertis on Social Media</h6>
                                <img src="../assetsuser/images/social.jpg" width="50px" height="50px"><br>
                                <a href="#" style="font-size: 11px;">Get people to repost your adverts and perform social tasks for you on their social media pages.</a><br><br>
                                <a href="{{ url('/user/advertise') }}" class="btn btn-outlin" style="padding: 3px 8px 3px 8px;font-size:12px;">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside class="nav-sidebar ">
        <div class="nav-header ">
            <a href="# "><img src="../assetsuser/images/logo1.png " alt="logo "></a><button class="nav-close "><i class="icofont-close "></i></button>
        </div>
        <div class="nav-content ">
            <a href="# "><img src="../assetsuser/images/attachment_86448295.gif " alt="logo "></a><button class="nav-close "><i class="icofont-close "></i></button>
        </div>
        <ul class="nav-list ">
            <li><a class="nav-link dropdown-link" href="#"><i class="icofont-listine-dots "></i>My Orders</a>
                <ul class="dropdown-list">
                    <li><a href="{{ url('/user/advert-task-orders') }}">Advert Task Order</a></li>
                    <li><a href="{{ url('/user/engagement-task-orders') }}">Engagement Task Order</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ url('/user/accepted-task') }}"><i class="fa fa-list"></i>Accepted Task</a> </li>

            <li><a class="nav-link" href="{{ url('/user/fund-wallet') }}"><i class="icofont-bag-alt"></i>Fund Wallet</a> </li>

            <li><a class="nav-link" href="{{ url('/user/place-withdrawal') }}"><i class="icofont-money "></i>Place withdrawal</a></li>

            <li><a class="nav-link" href="{{ url('/user/transaction-history') }}"><i class="icofont-listing-box "></i> Transaction History</a></li>

            <li><a class="nav-link" href="{{ url('/user/bank') }}"><i class="icofont-bag-alt"></i>Update Bank Details</a></li>

            <li><a class="nav-link" href="{{ url('/user/profile') }}"><i class="icofont-book-alt "></i>Edit Profile</a></li>

            <li><a class="nav-link " href="{{ url('logout') }}"><i class="icofont-logout "></i>logout</a></li>
        </ul>
        <div class="nav-info-group ">
            <div class="nav-info "><i class="icofont-ui-touch-phone "></i>
                <p><small>call us</small><span>+234 916 697 5341</span></p>
            </div>
            <div class="nav-info "><i class="icofont-ui-email "></i>
                <p><small>email us</small><span>enquiry@miscochat.ng</span></p>
            </div>
        </div>

        </div>
    </aside>
    <div class="mobile-menu ">
        <a href="{{ url('/user/dashboard') }}" title="Home Page"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="{{ url('/user/earn') }}" title="Wishlist"><i class="fas fa-wallet"></i><span>Earn</span></a>
        <button class="cart-btn" data-toggle="modal" data-target="#exampleModalCenter" style="padding: 5px;color:#5f04f6;"><i class="fas fa-bullseye"></i><span>Advertise</button>
        <a href="{{ url('/user/marketplace') }}" title="Wishlist"><i class="fas fa-cart-plus"></i><span>Market</span></a>
        <a href="{{ url('/user/profile') }}" title="Compare List"><i class="fas fa-user-alt"></i><span>Account</span>
        </a>
    </div><br>
    @yield('content')

    <footer class="footer-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xl-12 text-center">
                    <div class="footer-widget ">
                        <a class="footer-logo " href="# "><img src="../assetsuser/images/logo1.png " alt="logo "></a>
                        <p class="footer-desc ">Miscokit is the best platform best platform best platform best platform ever.</p>
                        <ul class="footer-social ">
                            <li>
                                <a class="icofont-facebook " href="#"></a>
                            </li>
                            <li>
                                <a class="icofont-twitter " href="#"></a>
                            </li>
                            <li>
                                <a class="icofont-linkedin " href="#"></a>
                            </li>
                            <li>
                                <a class="icofont-instagram " href="#"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 ">
                    <div class="footer-bottom ">
                        <p class="footer-copytext ">&copy; 2023 Miscochat Concept</p>
                        <div class="footer-card ">
                            <a href="#" class="text-white">About</a>
                            <a href="#" class="text-white">Support</a>
                            <a href="#" class="text-white">Privacy</a>
                            <a href="#" class="text-white">Terms</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assetsuser/vendor/countdown/countdown.min.js"></script>
    <script src="../assetsuser/vendor/niceselect/nice-select.min.js"></script>
    <script src="../assetsuser/vendor/slickslider/slick.min.js"></script>
    <script src="../assetsuser/vendor/venobox/venobox.min.js"></script>
    <script src="../assetsuser/js/nice-select.js"></script>
    <script src="../assetsuser/js/countdown.js"></script>
    <script src="../assetsuser/js/accordion.js"></script>
    <script src="../assetsuser/js/venobox.js"></script>
    <script src="../assetsuser/js/slick.js"></script>
    <script src="../assetsuser/js/main.js"></script>
</body>


</html>