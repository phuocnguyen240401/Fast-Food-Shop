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
        <div class="col-md-12">
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
                    <th>Địa chỉ giao hàng</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($products as $key => $product)
                {{-- duyệt mảng products trong session --}}
                @php
                    $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                    if($product->size=="S"){
                        $price=$price*1;
                    }
                    elseif($product->size=="M"){
                        $price=$price*1.2;
                    }
                    $priceEnd = $price * (int)$product->quantity;
                    $total += $priceEnd;
                @endphp
                <tr>
                <td>
                    <div class="columm-1">
                        <img src="{{ $product->thumb }}" alt="IMG">
                    </div>
                </td>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ number_format($price, 0, '', '.') }}
                </td>
                <td>
                    <input class="count-cart num-product numb-product" type="number" name="carts_product[{{ $product->id }}][quantity]" value="{{ (int)$product->quantity}}" readonly>
                <td>
                    <select name="carts_product[{{ $product->id }}][size]" id="size" class="size-cart" readonly>
                        <option value="S" {{  $product->size =="S" ? 'selected':'disabled' }}>S</option>
                        <option value="M" {{ $product->size =="M" ? 'selected':'disabled' }}>M</option>
                    </select>
                </td>
                <td>{{ number_format($product->pricetotal, 0, '', '.') }}</td>
                <td>{{ $product->address }}</td>
                <td>{{ $product->phonenumber}}</td>
                <td>
                {!! Helper::activeCarts($product->active) !!}
                </td>
                <td>
                    @if ($product->active!=0)
                    <a href="/targetcart/delete/{{ $product->cart_id}}">Xóa</a>
                    @endif

                </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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
