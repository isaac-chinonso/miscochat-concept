@extends('layout.userapp')
@section('title')
My Orders || Miscochat Concept
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="banner-btn" align="center">
                <a class="btn btn-inline" href="{{ url('/user/post-product') }}" style="padding: 7px 8px 7px 8px;font-size:12px;"><i class="fas fa-shopping-basket"></i><span>Post New Advert</span></a><br>
                <p>Get people to repost your adverts and perform social tasks for you on their social media pages</p>
            </div><br>
        </div>
    </div>
</div>

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('include.success')
                @include('include.warning')
                @include('include.error')
                <div class="account-card">
                    <h3 class="account-title">My Orders </h3>
                    <div class="orderlist">
                        <div class="table-scroll table-responsive">
                            <table class="table table-stripped table-list">
                                <thead>
                                    <tr style="background-color: #5f04f6;">
                                        <th class="text-white" scope="col">#</th>
                                        <th class="text-white">Advert Image</th>
                                        <th class="text-white">Date</th>
                                        <th class="text-white" scope="col">Platform</th>
                                        <th class="text-white" scope="col">Package</th>
                                        <th class="text-white" scope="col">Quantity</th>
                                        <th class="text-white" scope="col">Amount</th>
                                        <th class="text-white" scope="col">Religion</th>
                                        <th class="text-white" scope="col">Gender</th>
                                        <th class="text-white" scope="col">location</th>
                                        <th class="text-white" scope="col">Description</th>
                                        <th class="text-white">Status</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; ?>
                                    @foreach($order as $ord)
                                    <tr>
                                        <td>
                                            <h6>{{ $number }}</h6>
                                        </td>
                                        <td class="table-image"><img src="../advert/{{ $ord->image }}" alt="product"></td>
                                        <td>
                                            <h6>{{ $ord->created_at->format('d M Y ') }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $ord->platform }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $ord->package }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $ord->quantity }}</h6>
                                        </td>
                                        <td>
                                            <h6>₦{{ number_format($ord->amount, 0, '.', ', ') }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $ord->religion }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $ord->gender }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $ord->location }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $ord->caption }}</h6>
                                        </td>
                                        <td>
                                            @if($ord->status == 1)
                                            <span class="badge bg-success">Allocated</span>
                                            @elseif($ord->status == 0)
                                            <span class="badge bg-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#responsive-modal2{{ $ord->id }}"><i class="fa fa-trash text-danger"></i></a>
                                            <!-- modal content -->
                                            <div id="responsive-modal2{{ $ord->id }}" class="modal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4><strong>Confirm Deletion</strong></h4>
                                                            <p>Are you sure you want to Delete {{ $ord->name }}</p>
                                                            <img src="../product/{{ $ord->image }}" width="150px" height="100px" alt="product">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" style="padding: 7px 8px 7px 8px;font-size:12px;" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('deleteuserorder',$ord->id) }}" class="btn btn-danger" style="padding: 7px 8px 7px 8px;font-size:12px;">Delete Product</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->
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

        </div>
</section>
<hr>
@endsection