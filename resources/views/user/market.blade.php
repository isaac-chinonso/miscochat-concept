@extends('layout.userapp')
@section('title')
Marketplace || Miscochat Concept
@endsection
@section('content')

<section class="inner-section shop-part">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 ">
                <div class="section-heading ">
                    <h2>Miscochat Marketplace</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
            @foreach($product as $prod)
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <a class="product-image" href="#"><img src="../product/{{ $prod->image }}" height="170px" alt="product"></a>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name "><a href="#">{{ $prod->name }}</a></h6>
                        <h6 class="product-price"><span>₦{{ number_format($prod->price, 0, '.', ', ') }}</span></h6>
                        <a href="{{ route('userproductdetails', $prod->slug) }}" class="btn btn-outline" style="padding:7px 8px 7px 8px;font-size:12px;"><i class="fas fa-eye"></i>View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bottom-paginate">
                    <ul class="pagination">
                        <li class="page-item "><a class="page-link " href="# "><i class="fas fa-long-arrow-alt-left "></i></a></li>
                        <li class="page-item "><a class="page-link active " href="# ">{{ $product->links() }}</a></li>
                        <li class="page-item "><a class="page-link " href="# "><i class="fas fa-long-arrow-alt-right "></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
@endsection