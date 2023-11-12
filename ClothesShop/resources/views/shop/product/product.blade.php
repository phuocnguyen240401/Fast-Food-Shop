<div class="tab-content">
    <div id="all" data-tab-content class="active">
      <div class="row d-flex flex-wrap">
          @foreach ($products as $key=>$product)
          <div class="product-item col-lg-3 col-md-6 col-sm-6">
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
                  <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name,'-') }}.html">{{ $product->name }}</a>
              </h3>
              <div class="item-price text-primary">{!! Helper::price($product->price,$product->price_sale) !!}</div>
              </div>
          </div>
          @endforeach
          <div class="row">

          </div>
      </div>
    </div>

  </div>
  <nav class="navigation paging-navigation text-center padding-medium" role="navigation">
      <div class="pagination loop-pagination d-flex justify-content-center">
          <!-- Liên kết đầu tiên -->
          <div class="page-item @if ($products->onFirstPage()) disabled @endif">
              <a href="{{ $products->previousPageUrl() }}" class="pagination-arrow d-flex align-items-center">
                <i class="icon icon-arrow-left"></i>
              </a>
          </div>
          <!-- Liên kết trang -->
          @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
              <div class="page-numbers @if ($products->currentPage() == $page) active @endif">
                  <a class="page-link" href="{{ $url }}">{{ $page }}</a>
              </div>
          @endforeach

          <!-- Liên kết cuối cùng -->
          <div class="page-item @if ($products->currentPage() == $products->lastPage()) disabled @endif">
              <a href="{{ $products->nextPageUrl() }}" class="pagination-arrow d-flex align-items-center">
                  <i class="icon icon-arrow-right"></i>
                </a>
          </div>
      </div>
  </nav>
