@extends('layout.userapp')
@section('title')
Profile || Miscochat Concept
@endsection
@section('content')

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <h3 class="account-title">
                        @if (date("H") < 12) Good morning, <span class="text-danger">{{ $users->username }}</span>
                            @elseif (date("H") >= 12 && date("H") < 16) Good afternoon, <span class="text-danger">{{ $users->username }}</span>
                                @elseif (date("H") >= 15 && date("H") < 24) Good evening, <span class="text-danger"> {{ $users->username }}</span>
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
                    <h3 class="account-title">Account Settings</h3>
                    <div class="account-card">
                        <div class="account-content">
                            <div class="row">
                                <div class="col-lg-5"></div>
                                <div class="col-lg-2">
                                    <div class="profile-image ">
                                        <a href="# "><img src="../assetsuser/images/user.png " alt="user "></a>
                                    </div>
                                </div>
                                <div class="col-lg-5"></div>
                            </div><br>
                            <form method="POST" action="{{ route('updateprofile') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">First name</label>
                                            <input class="form-control" type="text" name="fname" value="{{ $users->fname }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Last name</label>
                                            <input class="form-control" type="text" name="lname" value="{{ $users->lname }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input class="form-control" type="text" value="{{ $users->username }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email" value="{{ $users->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input class="form-control" type="text" name="phone" value="{{ $users->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option disabled>Select Gender</option>
                                                <option value="{{ $users->gender }}" selected>{{ $users->gender }}</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input class="form-control" type="date" name="dob" value="{{ $users->dob }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Location</label>
                                            <input class="form-control" type="text" name="location" value="{{ $users->location }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Religion</label>
                                            <select class="form-control" name="religion">
                                                <option disabled>Select Religion</option>
                                                <option value="{{ $users->religion }}" selected>{{ $users->religion }}</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Islam">Islam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Short bio</label>
                                            <textarea class="form-control" name="bio">{{ $users->bio }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" align="center">
                                        <button type="submit" class="btn btn-inline">UPDATE ACCOUNT</button>
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