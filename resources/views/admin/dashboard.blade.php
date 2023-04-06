@extends('layout.adminapp')
@section('title')
Dashboard || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">
                        @if (date("H") < 12) Good morning, <span class="text-danger">{{ Auth::user()->username }}</span>
                            @elseif (date("H") >= 12 && date("H") < 16) Good afternoon, <span class="text-danger">{{ Auth::user()->username }}</span>
                                @elseif (date("H") >= 15 && date("H") < 24) Good evening, <span class="text-danger"> {{ Auth::user()->username }}</span>
                                    @endif
                    </h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Welcome back, {{ Auth::user()->username }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <h4 align="right">Total Balance: ₦{{ $totalbalance }}</h4>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Total Deposit</h5>
                                            <h2 class="font-weight-500 mb-0">₦{{ $totaldeposit }}</h2>
                                        </div>
                                        <div class="text-primary" style="padding: 35px;">
                                            <h1><span class="ti ti-import"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Task Earnings</h5>
                                            <h2 class="font-weight-500 mb-0">₦{{ $taskearning }}</h2>
                                        </div>
                                        <div class="text-info" style="padding: 35px;">
                                            <h1><span class="ti ti-wallet"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Total withdrawal</h5>
                                            <h2 class="font-weight-500 mb-0">₦{{ $totalwithdrawal }}</h2>
                                        </div>
                                        <div class="text-danger" style="padding: 35px;">
                                            <h1><span class="ti ti-export"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Total Spents</h5>
                                            <h2 class="font-weight-500 mb-0">₦{{ $totalspent }}</h2>
                                        </div>
                                        <div class="text-warning" style="padding: 35px;">
                                            <h1><span class="ti ti-new-window"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Referral Earnings</h5>
                                            <h2 class="font-weight-500 mb-0">{{ $referralearnings }}</h2>
                                        </div>
                                        <div class="text-secondary" style="padding: 35px;">
                                            <h1><span class="ti ti-wallet"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Total Referal</h5>
                                            <h2 class="font-weight-500 mb-0">{{ $referrals }}</h2>
                                        </div>
                                        <div class="text-success" style="padding: 35px;">
                                            <h1><span class="glyphicon glyphicon-share"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Total advert</h5>
                                            <h2 class="font-weight-500 mb-0">{{ $orders }}</h2>
                                        </div>
                                        <div class="text-warning" style="padding: 35px;">
                                            <h1><span class="glyphicon glyphicon-list"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Total Members</h5>
                                            <h2 class="font-weight-500 mb-0">{{ $users }}</h2>
                                        </div>
                                        <div class="text-primary" style="padding: 35px;">
                                            <h1><span class="fa fa-users"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Total Product</h5>
                                            <h2 class="font-weight-500 mb-0">{{ $products }}</h2>
                                        </div>
                                        <div class="text-secondary" style="padding: 35px;">
                                            <h1><span class="fa fa-shopping-basket"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

@endsection