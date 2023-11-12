@foreach ($productsgoodprice as $key=>$product)
<div class="product-item col-lg-3 col-md-6 col-sm-6">
    <div class="image-holder">
      <img src="{{ $product->thumb }}" alt="Books" class="product-image" style="height: ;">
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
      <div class="item-price text-primary">{!! Helper::price($product->price,$product->price_sale) !!}</div>
    </div>
  </div>
@endforeach
