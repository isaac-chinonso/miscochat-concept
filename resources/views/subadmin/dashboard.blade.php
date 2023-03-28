@extends('layout.subadminapp')
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
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Total Members</h5>
                                            <h2 class="font-weight-500 mb-0">{{ $users }}</h2>
                                        </div>
                                        <div class="text-info" style="padding: 35px;">
                                            <h1><span class="fa fa-users"></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="box">
                                <div class="box-body py-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-fade">Pending Topup</h5>
                                            <h2 class="font-weight-500 mb-0">0</h2>
                                        </div>
                                        <div class="text-success" style="padding: 35px;">
                                            <h1><span class="fa fa-arrow-up"></span></h1>
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