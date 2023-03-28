@extends('layout.master1')
@section('title')
Marketplace || Miscochat Concept
@endsection
@section('content')
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="../../assets/img/breadcrumb/breadcurmb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content">
                        <h3 class="breadcrumb__title">Market Place</h3>
                        <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                            <span><a href="#">Home</a></span>
                            <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!--product-details-area-start -->
    <div class="tp-product-details-area pt-130">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-5 col-lg-6 col-12">
                    <div class="tp-product-img">
                        <img src="../product/{{ $productdetails->image }}" alt="">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-12">
                    <div class="productdetails">
                        <div class="productdetails__content">
                            <span>{{ $productdetails->category->name }}</span>
                            <h3 class="pd-title">{{ $productdetails->name }}</h3>
                            <p>{{ $productdetails->description }}</p>
                        </div>
                        <div class="productdetails__ratting">
                            <span>( {{$productdetails->location }} )</span>
                            <h4>₦{{ number_format($productdetails->price, 0, '.', ', ') }}</h4>
                        </div>
                        <div class="productdetails__model">
                            <h5>Brand</h5>
                            <a href="#">{{ $productdetails->brand }}</a>
                        </div>
                        <div class="productdetails__button">
                            <button class="tp-btn-orange-radius mb-20 mr-20"><a href="tel:{{ $productdetails->user->phone }}"> <i class="fa fa-phone"></i> Call</a></button>
                            <button class="tp-btn-radius-2"><a href="https://wa.me/234{{ $productdetails->user->phone }}"> <i class="fa fa-user"></i> Whatsapp </a></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><br><br>
    <!-- product-details-area-end -->

    <!-- product-slider-area-end -->
    <div class="tp-product-slider pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="tp-product-slider-title">
                        <h3 class="tp-product-slider-title pb-45">Realated Product</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="tp-product-slider-active">
                        @foreach($similarprod as $prod)
                        <div class="slider-item">
                            <div class="tpproduct text-center mb-30">
                                <div class="tpproduct__img">
                                    <img class="w-100" src="../product/{{ $prod->image }}" alt="">
                                    <div class="tp-product-icon">
                                        <a href="{{ route('productdetails', $prod->slug) }}"><i class="fal fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="tpproduct__meta">
                                    <span> {{ $prod->category->name }} ( {{ $prod->location }} )</span>
                                    <h4 class="tp-product-title"><a href="#">{{ $prod->name }} ( {{ $prod->brand }} )</a></h4>
                                    <span>₦{{ number_format($prod->price, 0, '.', ', ') }}</span><br><br>
                                    <button class="btn btn-outline-secondary btn-sm"><a href="{{ route('productdetails', $prod->slug) }}"> View Product</a></button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-slider-area-end -->
</main>

@endsection