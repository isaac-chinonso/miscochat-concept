<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/custom-animation.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/style.css">

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

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

    <header>
        <!-- tp-header-area-start -->
        <div id="header-sticky" class="tp-header-area header-pl-pr header-transparent header-border-bottom">
            <div class="container-fluid">
                <div class="row g-0 align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-6">
                        <div class="tp-logo tp-logo-border">
                            <a href="{{ url('/') }}">
                                <img src="assets/img/logo/logo1.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-8 col-6 d-flex justify-content-end">
                        <div class="tp-main-menu d-none d-xl-block">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('/about') }}">About</a></li>
                                    <li><a href="{{ url('marketplace') }}">Marketplace</a></li>
                                    <li><a href="{{ url('/support') }}">Support</a></li>
                                    <li><a href="{{ url('/buy-coupon') }}">Buy Coupon</a></li>
                                    <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="tp-header-right">
                            <ul>

                                <li><a class="tp-menu-bar" href="javascript:void(0)"><i class="fas fa-bars"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-header-area-end -->
    </header>

    <!-- tp-offcanvus-area-start -->
    <div class="tp-offcanvas-area">
        <div class="tpoffcanvas">
            <div class="tpoffcanvas__close-btn">
                <button class="close-btn"><i class="fal fa-times"></i></button>
            </div><br>
            <div class="tpoffcanvas__text">
                <p>If you have any questions or need additional information, do not hesitate to contact us. We have an unbeatable support system so you can contact us</p>
            </div>
            <div class="mobile-menu"></div>
            <h6><a href="{{ url('/register') }}" class="text-white">Create Account</a></h6><br>
            <h6><a href="{{ url('/login') }}" class="text-white">Login to Account</a></h6>
            <div class="tpoffcanvas__info">
                <h3 class="offcanva-title">Get In Touch</h3>
                <div class="tp-info-wrapper mb-20 d-flex align-items-center">
                    <div class="tpoffcanvas__info-icon">
                        <a href="#"><i class="fal fa-envelope"></i></a>
                    </div>
                    <div class="tpoffcanvas__info-address">
                        <span>Email</span>
                        <a href="maito:themiscochat@gmail.com"><span class="__cf_email__">themiscochat@gmail.com</span></a>
                    </div>
                </div>
                <div class="tp-info-wrapper mb-20 d-flex align-items-center">
                    <div class="tpoffcanvas__info-icon">
                        <a href="#"><i class="fal fa-phone-alt"></i></a>
                    </div>
                    <div class="tpoffcanvas__info-address">
                        <span>Phone</span>
                        <a href="tel:+2349166975341">+234 9166 975 341</a>
                    </div>
                </div>
            </div>
            <div class="tpoffcanvas__social">
                <div class="social-icon">
                    <a href="https://instagram.com/miscochatofficial1" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://facebook.com/groups/2796370700613614/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="body-overlay"></div>
    <!-- tp-offcanvus-area-end -->

    @yield('content')

    <footer>
        <!-- tp-footer-area-start -->
        <div class="tp-footer-area footer-bg pt-130" data-background="assets/img/footer/footer-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-6 mb-30">
                        <div class="tp-footer-widget z-index-3">
                            <div class="tp-footer-widget__title">
                                <h4 class="tp-footer-title">Pages</h4>
                            </div>
                            <div class="tp-footer-widget__list">
                                <ul>
                                    <li><a href="{{ url('/about') }}">About us</a></li>
                                    <li><a href="{{ url('/support') }}">Contact</a></li>
                                    <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-30">
                        <div class="tp-footer-widget footer-space-two z-index-3">
                            <div class="tp-footer-widget__title">
                                <h4 class="tp-footer-title">Resources</h4>
                            </div>
                            <div class="tp-footer-widget__list">
                                <ul>
                                    <li><a href="{{ url('/buy-coupon') }}">Buy Coupon Code</a></li>
                                    <li><a href="#">How Miscochat Works</a></li>
                                    <li><a href="{{ url('/support') }}">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-30">
                        <div class="tp-footer-widget footer-space-three z-index-3">
                            <div class="tp-footer-widget__title">
                                <h4 class="tp-footer-title">Quick links</h4>
                            </div>
                            <div class="tp-footer-widget__list">
                                <ul>
                                    <li><a href="{{ url('/marketplace') }}">Marketplace</a></li>
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="{{ url('/register') }}">Create Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 mb-30">
                        <div class="tp-footer-widget z-index-3">
                            <div class="tp-footer-widget__title">
                                <h4 class="tp-footer-title">Contact Us</h4>
                            </div>
                            <div class="tp-footer-widget__list">
                                <ul class="footer-position">
                                    <li>
                                        <a href="#" target="_blank">
                                            <span><i class="fal fa-map-marker-alt"></i></span> 29 Edo Ezemewi Road, (Bank Road) Nnewi, Anambra State Nnewi, Anambra</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span><i class="fal fa-envelope-open"></i></span>enquiry@miscochat.ng</a>
                                    </li>
                                    <li>
                                        <a href="tel:+2349166975341">
                                            <span><i class="fal fa-phone-alt"></i></span> +234 9166 975 341</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy-right-wrapper z-index-3">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-12">
                            <div class="copyright-left text-center text-lg-start">
                                <p>©Copy RIght 2023 All Rights Reserved - Miscochat Concept</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-footer-area-end -->

        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="far fa-angle-double-up"></i>
        </button>


    </footer>

    <!-- JS here -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/magnific-popup.js"></script>
    <script src="assets/js/counterup.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/meanmenu.js"></script>
    <script src="assets/js/isotope-pkgd.js"></script>
    <script src="assets/js/imagesloaded-pkgd.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>