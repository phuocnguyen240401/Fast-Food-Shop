@extends('shop.layout.app')
@section('header')
@include('shop.layout.head')
@endsection
@section('content')
@include('shop.main.header')
<section id="billboard" class="overflow-hidden">

    <button class="button-prev">
      <i class="icon icon-chevron-left"></i>
    </button>
    <button class="button-next">
      <i class="icon icon-chevron-right"></i>
    </button>
    <div class="swiper main-swiper">
      <div class="swiper-wrapper">
        @foreach ($sliders as $key=>$slider){
            <div class="swiper-slide" style="background-image: url('{{ $slider->thumb }}');background-repeat: no-repeat;background-size: cover;background-position: center;">
                <div class="banner-content">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <h2 class="banner-title text-white">{{ $slider->name }}</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac.</p>
                        <div class="btn-wrap">
                          <a href="{{ $slider->url }}" class="btn btn-light btn-medium d-flex align-items-center" tabindex="0">Shop it now <i class="icon icon-arrow-io"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        }
        @endforeach
      </div>
    </div>
  </section>

  <section id="featured-products" class="product-store padding-large">
    <div class="container">
      <div class="section-header d-flex flex-wrap align-items-center justify-content-between">
        <h2 class="section-title">Sản phẩm nổi bật</h2>
        <div class="btn-wrap">
          <a href="#shop" class="d-flex align-items-center">Xem toàn bộ sản phẩm<i class="icon icon icon-arrow-io"></i></a>
        </div>
      </div>
      <div class="swiper product-swiper overflow-hidden">
        <div class="swiper-wrapper">
            @foreach ($productsnew as $key => $product)
            <div class="swiper-slide">
                <div class="product-item">
                  <div class="image-holder">
                    <img src="{{ $product->thumb }}" alt="Books" class="product-image">
                  </div>
                  <div class="cart-concern">
                    <div class="cart-button d-flex justify-content-between align-items-center">
                      <button type="button" class="btn-wrap cart-link d-flex align-items-center"><a class="" href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name,'-') }}.html"><p>add to cart</p><i class="icon icon-arrow-io"></i></a>
                      </button>
                      <button type="button" class="view-btn tooltip
                          d-flex">
                        <i class="icon icon-screen-full"></i>
                        <span class="tooltip-text">Quick view</span>
                      </button>
                    </div>
                  </div>
                  <div class="product-detail">
                    <h3 class="product-title">
                      <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name,'-') }}.html">{{$product->name }}</a>
                    </h3>
                    <span class="item-price text-primary">{!! Helper::price($product->price,$product->price_sale) !!}</span>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <section id="latest-collection">
    <div class="container">
      <div class="product-collection row">
        {!! Helper::menutop($menustop) !!}
      </div>
    </div>
  </section>
  <section id="selling-products" class="product-store bg-light-grey padding-large">
    <div class="container">
      <div class="section-header">
        <h2 id="shop" class="section-title">sản phẩm của shop</h2>
      </div>
      <ul class="tabs list-unstyled">
        <li data-tab-target="#all" class="active tab">Tất cả</li>
      </ul>
      <div class="tab-content">
        <div id="all" data-tab-content class="active">

          <div id="loadProduct" class="row d-flex flex-wrap">
                 @include('shop.main.product')
          </div>
          <div id="btn-load-more" class="row text-center">
            <input type="hidden" id="page" value="1">
            <button id="btn_loadmore" onclick="loadmore()" class="btn btn-dark ">Load more</button>
          </div>

        </div>
@include('shop.main.footer')
@endsection
@section('footer')
@include('shop.layout.foot')
@endsection
