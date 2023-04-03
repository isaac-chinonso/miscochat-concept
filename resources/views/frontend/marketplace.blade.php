@extends('layout.master')
@section('title')
Marketplace || Miscochat Concept
@endsection
@section('content')
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="assets/img/breadcrumb/breadcurmb.jpg">
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

    <!-- product-area-start -->
    <div class="tp-product-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                @foreach($products as $prod)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow tpfadeUp" data-wow-duration=".3s" data-wow-delay=".6s">
                    <div class="tpproduct text-center mb-50">
                        <div class="tpproduct__img">
                            <img class="w-100" src="product/{{ $prod->image }}" alt="">
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
            <div class="row">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="basic-pagination mt-30 text-center">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">{{ $products->links() }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-area-end -->

    <!-- tp-social-area-start -->
    <div class="tp-social-area social-space-bottom fix">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12" align="center">
                    <img src="assets/img/googleplay.png">
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="https://facebook.com/groups/2796370700613614/" target="_blank">
                        <div class="tp-social-item">
                            <span><i class="fab fa-facebook-f"></i> Facebook</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="https://instagram.com/miscochatofficial1" target="_blank">
                        <div class="tp-social-item tp-youtube">
                            <span><i class="fab fa-instagram"></i> instagram</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-social-area-end -->
</main>

@endsection