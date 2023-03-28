@extends('layout.userapp')
@section('title')
My Product || Miscochat Concept
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
                <a class="btn btn-inline" href="{{ url('/user/post-product') }}" style="padding: 7px 8px 7px 8px;font-size:12px;"><i class="fas fa-shopping-basket"></i><span>Post New Item</span></a><br>
                <p>Post New Item on Miscochat Marketplace</p>
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
                    <h3 class="account-title">Product List on Miscochat Market </h3>
                    <div class="orderlist">
                        <div class="table-scroll table-responsive">
                            <table class="table table-stripped table-list">
                                <thead>
                                    <tr style="background-color: #5f04f6;">
                                        <th class="text-white" scope="col">#</th>
                                        <th class="text-white" scope="col">Product</th>
                                        <th class="text-white" scope="col">Name</th>
                                        <th class="text-white" scope="col">Price</th>
                                        <th class="text-white" scope="col">brand</th>
                                        <th class="text-white" scope="col">Phone</th>
                                        <th class="text-white" scope="col">location</th>
                                        <th class="text-white" scope="col">Description</th>
                                        <th class="text-white">Status</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; ?>
                                    @foreach($product as $prod)
                                    <tr>
                                        <td class="table-serial">
                                            <h6>{{ $number }}</h6>
                                        </td>
                                        <td class="table-image"><img src="../product/{{ $prod->image }}" alt="product"></td>
                                        <td class="table-name">
                                            <h6>{{ $prod->name }}</h6>
                                        </td>
                                        <td class="table-price">
                                            <h6>₦{{ number_format($prod->price, 0, '.', ', ') }}</h6>
                                        </td>
                                        <td class="table-brand">
                                            <h6>{{ $prod->brand }}</h6>
                                        </td>
                                        <td class="table-quantity">
                                            <h6>{{ $prod->phone }}</h6>
                                        </td>
                                        <td class="table-quantity">
                                            <h6>{{ $prod->location }}</h6>
                                        </td>
                                        <td class="table-quantity">
                                            <h6>{{ $prod->description }}</h6>
                                        </td>
                                        <td>
                                            @if($prod->status == 1)
                                            <span class="badge bg-success">Active</span>
                                            @elseif($prod->status == 0)
                                            <span class="badge bg-danger">Disabled</span>
                                            @endif
                                        </td>
                                        <td class="table-quantity">
                                            <a href="#" data-toggle="modal" data-target="#responsive-modal2{{ $prod->id }}"><i class="fa fa-trash text-danger"></i></a>
                                            <!-- modal content -->
                                            <div id="responsive-modal2{{ $prod->id }}" class="modal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4><strong>Confirm Deletion</strong></h4>
                                                            <p>Are you sure you want to Delete {{ $prod->name }}</p>
                                                            <img src="../product/{{ $prod->image }}" width="150px" height="100px" alt="product">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" style="padding: 7px 8px 7px 8px;font-size:12px;" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('deleteuserproduct',$prod->id) }}" class="btn btn-danger" style="padding: 7px 8px 7px 8px;font-size:12px;">Delete Product</a>
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