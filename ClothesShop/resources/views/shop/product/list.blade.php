@extends('shop.layout.app')
@section('header')
@include('shop.layout.head')
@endsection
@section('content')
@include('shop.main.header')
{!! Helper::menusbrand($menulist)!!}
  <div class="shopify-grid padding-large">
    <div class="container">
      <div class="row">

        <section id="selling-products" class="col-md-9 product-store">
          <div class="container">
            <ul class="tabs list-unstyled">
                @foreach ($menulist as $menu)
                <li data-tab-target="#" class="tab"><a href="/danh-muc/{{ $menu->id }}-{{ Str::slug($menu->name,'-') }}.html">{{ $menu->name }}</a></li>
                @endforeach

            </ul>
            @include('shop.product.product')
          </div>
        </section>

        <aside class="col-md-3">
          <div class="sidebar">
            <div class="widgets widget-menu">
              <div class="widget-search-bar">
                <form role="search" method="get" class="d-flex">
                  <input name="search-products" class="search-field" placeholder="Search" type="text">
                  <button class="btn btn-dark"><i class="icon icon-search"></i></button>
                </form>
              </div>
            </div>
            <div class="widgets widget-price-filter">
              <h5 class="widget-title">Lọc theo giá:</h5>
              <ul class="product-tags sidebar-list list-unstyled">
                <li class="tags-item">
                    <a href="{{ request()->fullUrlWithQuery(['filter' => '1'])}}">Toàn bộ</a>
                  </li>
                <li class="tags-item">
                  <a href="{{ request()->fullUrlWithQuery(['filter' => '2'])}}">Nhỏ hơn 100.0000đ</a>
                </li>
                <li class="tags-item">
                  <a href="{{ request()->fullUrlWithQuery(['filter' => '3'])}}">Từ 100.0000đ-300.000đ</a>
                </li>
                <li class="tags-item">
                  <a href="{{ request()->fullUrlWithQuery(['filter' => '4'])}}">Lớn hơn 300.000đ</a>
                </li>
                <li class="tags-item">
                    <a href="{{ request()->fullUrlWithQuery(['filter' => '5'])}}">sản phẩm có khuyến mãi</a>
                  </li>
              </ul>
            </div>
            <div class="widgets widget-price-filter">
                <h5 class="widget-title">Xắp xếp theo :</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="{{ request()->fullUrlWithQuery(['sort' => '1'])}}">Theo thứ tự A->Z</a>
                  </li>
                  <li class="tags-item">
                    <a href="{{ request()->fullUrlWithQuery(['sort' => '2'])}}">Theo thứ tự Z->A</a>
                  </li>
                  <li class="tags-item">
                    <a href="{{ request()->fullUrlWithQuery(['sort' => '3'])}}">Từ giá thấp đến cao</a>
                  </li>
                  <li class="tags-item">
                    <a href="{{ request()->fullUrlWithQuery(['sort' => '4'])}}">Từ giá cao đến thấp</a>
                  </li>
                </ul>
              </div>
          </div>
        </aside>

      </div>
    </div>
  </div>

  <hr>
  </section>
@include('shop.main.footer')
@endsection
@section('footer')
@include('shop.layout.foot')
@endsection
