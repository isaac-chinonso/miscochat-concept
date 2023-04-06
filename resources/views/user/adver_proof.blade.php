@extends('layout.userapp1')
@section('title')
Advert Task Proof || Miscochat Concept
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
            <div class="col-md-12">
                @include('include.success')
                @include('include.warning')
                @include('include.error')
                <div class="account-card">
                    <h3 class="account-title">Advert Task Perfomance Proof &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <a href="{{ route('useradverttaskprogress', $submitedtasks->order_id) }}">Go back</a></h3>
                    <div class="orderlist">
                        <h4>Screenshot 1</h4>
                        <img src="../../proof/{{ $submitedtasks->image }}" width="300px" style="height:100%;"><br><hr>
                        <h4>Screenshot 2</h4>
                        <img src="../../proof/{{ $submitedtasks->image1 }}" width="300px" style="height:100%;"><br><hr>
                        <h4>Screenshot 3</h4>
                        <img src="../../proof/{{ $submitedtasks->image2 }}" width="300px" style="height:100%;"><br><hr>
                        <h4>Screenshot 4</h4>
                        <img src="../../proof/{{ $submitedtasks->image3 }}" width="300px" style="height:100%;">
                    </div>
                </div>
            </div>

        </div>
</section>
<hr>
@endsection