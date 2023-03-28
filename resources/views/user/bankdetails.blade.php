@extends('layout.userapp')
@section('title')
Update Bank Details || Miscochat Concept
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
            <div class="col-lg-12">
                @include('include.success')
                @include('include.warning')
                @include('include.error')
                <div class="account-card">
                    <h3 class="account-title">Update Bank Details</h3>
                    <div class="account-card">
                        <div class="account-content">
                            <form method="POST" action="{{ url('/user/save-bank') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Select Bank</label>
                                            <select class="form-control" name="bank_name">
                                                <option value="{{ Auth::user()->bank->first()->bank_name }}" selected>{{ Auth::user()->bank->first()->bank_name }}</option>
                                                <option value="First Bank of Nigeria">First Bank of Nigeria</option>
                                                <option value="Titan Bank">Titan Bank</option>
                                                <option value="Parallex Bank">Parallex Bank</option>
                                                <option value="Unity Bank">Unity Bank</option>
                                                <option value="VFD">VFD</option>
                                                <option value="ASO Savings and Loans">ASO Savings and Loans</option>
                                                <option value="Heritage Bank">Heritage Bank</option>
                                                <option value="TAJ Bank">TAJ Bank</option>
                                                <option value="Providus Bank">Providus Bank</option>
                                                <option value="Rubies MFB">Rubies MFB</option>
                                                <option value="Keystone Bank">Keystone Bank</option>
                                                <option value="Hasal Microfinance Bank">Hasal Microfinance Bank</option>
                                                <option value="Citibank Nigeria">Citibank Nigeria</option>
                                                <option value="Zenith Bank">Zenith Bank</option>
                                                <option value="United Bank For Africa">United Bank For Africa</option>
                                                <option value="Bowen Microfinance Bank">Bowen Microfinance Bank</option>
                                                <option value="Wema Bank">Wema Bank</option>
                                                <option value="First City Monument Bank">First City Monument Bank</option>
                                                <option value="Globus Bank">Globus Bank</option>
                                                <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                                <option value="TCF MFB">TCF MFB</option>
                                                <option value="Sterling Bank">Sterling Bank</option>
                                                <option value="Fidelity Bank">Fidelity Bank</option>
                                                <option value="Ekondo Microfinance Bank">Ekondo Microfinance Bank</option>
                                                <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                <option value="Access Bank">Access Bank</option>
                                                <option value="Union Bank of Nigeria">Union Bank of Nigeria</option>
                                                <option value="Polaris Bank">Polaris Bank</option>
                                                <option value="Ecobank Nigeria">Ecobank Nigeria</option>
                                                <option value="CEMCS Microfinance Bank">CEMCS Microfinance Bank</option>
                                                <option value="Access Bank (Diamond)">Access Bank (Diamond)</option>
                                                <option value="Sparkle Microfinance Bank">Sparkle Microfinance Bank</option>
                                                <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                                                <option value="Jaiz Bank">Jaiz Bank</option>
                                                <option value="Suntrust Bank">Suntrust Bank</option>
                                                <option value="Kuda Bank">Kuda Bank</option>
                                                <option value="Palmpay">Palmpay</option>
                                                <option value="Opay (Paycom)">Opay (Paycom)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Account Number</label>
                                            <input type="text" class="form-control" name="account_num" value="{{ Auth::user()->bank->first()->account_num }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Account Name</label>
                                            <input type="text" class="form-control" name="account_name" value="{{ Auth::user()->bank->first()->account_num }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" align="center">
                                        <button type="submit" class="btn btn-inline">UPDATE BANK DETAILS</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
</div>
<hr>
@endsection