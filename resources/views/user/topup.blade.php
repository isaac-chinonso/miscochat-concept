@extends('layout.userapp')
@section('title')
Topup Request || Miscochat Concept
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
                @include('include.success')
                @include('include.warning')
                @include('include.error')

                <br>
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
</section>

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="account-card">
                    <h3 class="account-title">Airtime/Data Topup Request</h3>
                    <p>Please Enter Airtime/Data Topup Information. Fund will be deducted from Wallet Balance</p>
                    <br>
                    <form method="post" action="{{ url('/user/topup') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6" style="padding-top: 18px;">
                                <label>Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="type">
                                    <option selected disabled>Select Topup Type</option>
                                    <option value="Airtime">Airtime</option>
                                    <option value="Data">Data</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="padding-top: 18px;">
                                <label>Amount (₦)<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="amount" placeholder="₦0.00">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6" style="padding-top: 18px;">
                                <label>network<span class="text-danger">*</span></label>
                                <select class="form-control" name="network">
                                    <option selected disabled>Select Network</option>
                                    <option value="MTN">MTN</option>
                                    <option value="GLO">GLO</option>
                                    <option value="AIRTEL">AIRTEL</option>
                                    <option value="9MOBILE">9MOBILE</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="padding-top: 18px;">
                                <label>Phone Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="081XXXXXXXXX">
                            </div><br class="mobileshow">
                        </div><br><br>
                        <div align="center">
                            <button type="submit" class="btn btn-inline">Place Topup Request</button>
                        </div>
                    </form><br>
                    <p style="font-size: 13px;">Please note that Topup Request takes between 24-48hrs to get to your Submitted Phone Number</p>
                </div>
                <div class="account-card">
                    <h3 class="account-title">My Airtime/Data Topup History </h3>
                    <div class="orderlist">
                        <div class="table-scroll table-responsive">
                            <table class="table table-stripped table-list">
                                <thead>
                                    <tr style="background-color: #5f04f6;">
                                        <th class="text-white" scope="col">#</th>
                                        <th class="text-white">Date</th>
                                        <th class="text-white">Amount</th>
                                        <th class="text-white">Type</th>
                                        <th class="text-white">Phone</th>
                                        <th class="text-white">Network</th>
                                        <th class="text-white">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; ?>
                                    @foreach($topup as $top)
                                    <tr>
                                        <td>
                                            <h6>{{ $number }}</h6>
                                        </td>
                                        <td>{{ $top->created_at->format('d M Y ') }}</td>
                                        <td>₦{{ number_format($top->amount, 0, '.', ', ') }}</td>
                                        <td>{{ $top->type }}</td>
                                        <td>{{ $top->phone }}</td>
                                        <td>{{ $top->network }}</td>
                                        <td>
                                            @if($top->status == 0)
                                            <span class="badge bg-danger">Pending</span>
                                            @elseif($top->status == 1)
                                            <span class="badge bg-success">Paid</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $number++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <section class="inner-section wallet-part">
                    <div class="container">
                        <div class="account-card"><br>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <h3 class="text-center"><strong>Data Plan Price List</strong></h3>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @foreach($topupplan as $plan)
                                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
                                    <div class="col">
                                        &nbsp; &nbsp;&nbsp;
                                        @if($plan->network == 1)
                                        <img src="../assetsuser/images/mtn.jpg" width="50px" height="50px">
                                        @elseif($plan->network == 2)
                                        <img src="../assetsuser/images/glo.jpg" width="50px" height="40px">
                                        @elseif($plan->network == 4)
                                        <img src="../assetsuser/images/airtel.png" width="50px" height="40px">
                                        @elseif($plan->network == 3)
                                        <img src="../assetsuser/images/9mobile.png" width="40px" height="50px">
                                        @endif
                                        &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                        <a href="#" style="font-size: 20px;text-align:left;">{{ $plan->unit }} - ₦{{ number_format($plan->price, 0, '.', ', ') }}</a>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</section>
<hr>
@endsection