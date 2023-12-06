<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assetsuser/images/favicon.png">

    <title>@yield('title')</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="../../assetadmin/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="../../assetadmin/css/style.css">
    <link rel="stylesheet" href="../../assetadmin/css/skin_color.css">
    <link rel="stylesheet" href="../assetsuser/fonts/fontawesome/fontawesome.min.css">
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

<body class="hold-transition light-skin sidebar-mini theme-primary">

    <div class="wrapper">

        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
                    <i data-feather="menu"></i>
                </a>
                <!-- Logo -->
                <a href="index.html" class="logo">
                    <!-- logo-->
                    <div class="logo-lg">
                        <span class="light-logo"><img src="../../assetadmin/images/logo1.png" alt="logo"></span>
                        <span class="dark-logo"><img src="../../assetadmin/images/logo1.png" alt="logo"></span>
                    </div>
                </a>
            </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item d-md-none">
                            <a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
                                <i data-feather="menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>
                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
                                <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="{{ url('/admin/settings') }}"><i class="ti-settings text-muted mr-2"></i> Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">
                <div class="user-profile px-20 pt-15 pb-10">
                    <div class="d-flex align-items-center">
                        <div class="image">
                            <img src="../assetadmin/images/avatar/avatar-13.png" class="avatar avatar-lg bg-primary-light rounded100" alt="User Image">
                        </div>
                        <div class="info">
                            <a class="dropdown-toggle px-20" data-toggle="dropdown" href="#">{{ Auth::user()->username }} </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/admin/settings') }}"><i class="ti-settings"></i> Settings</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/category') }}">
                            <i class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                            <span>Product Category</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Briefcase"><span class="path1"></span><span class="path2"></span></i>Adverts
                            <span class="pull-right-container">
                                <i class="ti ti-angle-double-down pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/product') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products</a></li>
                            <li><a href="{{ url('/admin/orders') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Orders</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/admin/task') }}">
                            <i class="icon-File"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            <span>Tasks Allocated</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/coupon') }}">
                            <i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
                            <span>Coupons Code</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/transaction-history') }}">
                            <i class="ti ti-export"><span class="path1"></span><span class="path2"></span></i>
                            <span>Transaction History</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>Members
                            <span class="pull-right-container">
                                <i class="ti ti-angle-double-down pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/members') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Users</a></li>
                            <li><a href="{{ url('/admin/subadmins') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sub Admin</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Credit-card"><span class="path1"></span><span class="path2"></span></i>Mobile Topup
                            <span class="pull-right-container">
                                <i class="ti ti-angle-double-down pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/topup-plan') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Topup Plan</a></li>
                            <li><a href="{{ url('/admin/pending-topup') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending Request</a></li>
                            <li><a href="{{ url('/admin/active-topup') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Completed Request</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="ti ti-wallet"><span class="path1"></span><span class="path2"></span></i>Deposit
                            <span class="pull-right-container">
                                <i class="ti ti-angle-double-down pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/manual-deposit') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Manual Deposit</a></li>
                            <li><a href="{{ url('/admin/pending-deposit') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending Deposit</a></li>
                            <li><a href="{{ url('/admin/active-deposit') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Completed Deposit </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Credit-card"><span class="path1"></span><span class="path2"></span></i>Withdrawal
                            <span class="pull-right-container">
                                <i class="ti ti-angle-double-down pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/manual-withdrawal') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Manual Withdrawal</a></li>
                            <li><a href="{{ url('/admin/pending-withdrawal') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending Withdrawal</a></li>
                            <li><a href="{{ url('/admin/active-withdrawal') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Paid Withdrawal </a></li>
                            <li><a href="{{ url('/admin/pending-referral-withdrawal') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending Referral Payment</a></li>
                            <li><a href="{{ url('/admin/active-referral-withdrawal') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Paid Referral Withdrawal </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/admin/notice-board') }}">
                            <i class="icon-Chat"><span class="path1"></span><span class="path2"></span></i>
                            <span>Notice Board</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        @yield('content')

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            &copy; 2023 <a href="#">Miscochat Concept</a>. All Rights Reserved.
        </footer>


        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- Page Content overlay -->


    <!-- Vendor JS -->
    <script src="../../assetadmin/js/vendors.min.js"></script>
    <script src="../../assetadmin/assets/icons/feather-icons/feather.min.js"></script>

    <!-- Joblly App -->
    <script src="../../assetadmin/js/template.js"></script>

    <script src="../../assetadmin/assets/vendor_components/datatable/datatables.min.js"></script>

    <script src="../../assetadmin/js/pages/data-table.js"></script>

</body>

</html>