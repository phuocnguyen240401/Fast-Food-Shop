@extends('shop.layout.app')
@section('header')
@include('shop.layout.head')
@endsection
@section('content')
@include('shop.main.header')

<div class="container p-t-80">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
           class="stext-109 cl8 hov-cl1 trans-04">
            {{ $product->menu->name }}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $title }}
        </span>
    </div>
</div>
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 1539px;">
                                    <div class="item-slick3 slick-slide slick-current slick-active"
                                         data-thumb="images/product-detail-01.jpg" data-slick-index="0"
                                         aria-hidden="false"
                                         style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                         tabindex="0" role="tabpanel" id="slick-slide10"
                                         aria-describedby="slick-slide-control10">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">

                    @include('shop.layout.arlert')

                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                       Tên sản phẩm: {{ $title }}

                    </h4>

                    <h3 class="mtext-106 cl2">
                        Giá:
                        <div id="sizeM" style="display:none;">
                            {!! \App\Helpers\Helper::price($product->price*1.2, $product->price_sale*1.2) !!}
                        </div>
                        <div id="sizeS" >
                            {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}
                        </div>

                    </h3>
                    <p class="stext-102 cl3 p-t-23">
                        Mô tả:
                        {{ $product->description }}
                    </p>

                    <!--  -->
                    <div class="p-t-33">
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <form action="/add-cart" method="post">
                                    @if ($product->price !== NULL)
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <label class=" form-control-label">Size:</label>
                                        <select id="size">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                        </select>
                                        <input type="hidden" name="getsize" id="getsize" value="S">
                                    </div>
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <label for="">Số lượng:</label>
                                            <input class="numb-product" type="number" name="num_product" value="1" style="width: 80px;"">
                                        </div>
                                        <button type="submit"
                                                class="flex-c-m btn btn-dark ">
                                            Add to cart
                                        </button>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    @endif
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                            information</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {!! $product->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Sản phẩm nổi bật:
            </h3>
        </div>
        <div id="new-products">
            @include('shop.main.product')
        </div>

    </div>
</section>
<hr>
@include('shop.main.footer')
@endsection
@section('footer')
@include('shop.layout.foot')

@endsection
