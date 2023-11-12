@extends('shop.layout.app')
@section('header')
@include('shop.layout.head')
@endsection
@section('content')
@include('shop.main.header')
<hr>
<form method="POST">
    @csrf
<div class="carts-shop row">
    @include('admin.layout.arlert')
    @if (count($products) != 0)
        <div class="col-md-8">
            @php $total = 0; @endphp
            {{-- lấy giá trị tống số tiền --}}
            <table class="carts-table u-full-width">
                <thead>
                    <tr>
                    <th>&nbsp;</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Kích thước</th>
                    <th>Thành tiền</th>
                    <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($products as $key => $product)
                {{-- duyệt mảng products trong session --}}
                @php
                    $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                    if($carts[$product->id]['size']=="S"){
                        $price=$price*1;
                    }
                    elseif($carts[$product->id]['size']=="M"){
                        $price=$price*1.2;
                    }
                    $priceEnd = $price * (int)$carts[$product->id]['quantity'];
                    $total += $priceEnd;
                @endphp
                <tr>
                <td>
                    <div class="columm-1">
                        <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name,'-') }}.html"><img src="{{ $product->thumb }}" alt="IMG"></a>

                    </div>
                </td>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ number_format($price, 0, '', '.') }}
                </td>
                <td>
                    <input class="count-cart num-product numb-product" type="number" name="carts_product[{{ $product->id }}][quantity]" value="{{ (int)$carts[$product->id]['quantity'] }}" readonly>
                <td>
                    <select name="carts_product[{{ $product->id }}][size]" id="size" class="size-cart" readonly>
                        <option value="S" {{  $carts[$product->id]['size'] =="S" ? 'selected':'disabled' }}>S</option>
                        <option value="M" {{  $carts[$product->id]['size'] =="M" ? 'selected':'disabled' }}>M</option>
                    </select>
                </td>
                <td>{{ number_format($priceEnd, 0, '', '.') }}</td>
                <td>
                    <a href="/carts/delete/{{ $product->id }}">Xóa</a>
                </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="row">
                <h4 class="mtext-109 cl2 p-b-30">
                    Thông tin đơn hàng
                </h4>
            </div>
            <div class="row">
                    Tổng tiền:  {{ number_format($total, 0, '', '.') }} đ
            </div>
            <div class="row">
            <div class="col-md-6">
                <input class="coupon-form u-full-width" type="text" name="coupon" placeholder="Nhập mã quà tặng" id="">
            </div>
            <div class="col-md-6">
                <button
                class="btn btn-small btn-pill btn-dark">
                Áp dụng mã
                </button>
            </div>
            </div>

        </div>
        <input type="submit" value="Mua hàng" formaction="/buy-cart" {{-- formaction dùng để chuyển sang một link khác không phải của form hiện tại --}}
        class="btn btn-medium btn-pill btn-dark">
@else
<div class="text-center"><h2>Giỏ hàng trống</h2></div>
@endif
</div>
</form>
@include('shop.main.footer')
@endsection
@section('footer')
@include('shop.layout.foot')
@endsection
