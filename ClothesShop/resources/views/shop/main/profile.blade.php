@extends('shop.layout.app')
@section('header')
@include('shop.layout.head')
@endsection
@section('content')
@include('shop.main.header')
<hr>
<div class="container">
    @include('shop.layout.arlert')
    <div class="profile-form row">
        <h3>
            Thông tin khách hàng
        </h3>
        <form action="/uploadprofile" method="post">
            @csrf
            <div class="col-md-6">
                <label for="txtusername">Tên người dùng:</label>
                <input name="name" class="u-full-width" type="text" placeholder="Vui lòng nhập tên người dùng" value="{{ $customer->name}}">
            </div>
            <div class="col-md-6">
                <label for="exampleEmailInput">Số điện thoại:</label>
                <input  name="phonenumber"  class="u-full-width" type="text" placeholder="Vui lòng nhập số điện thoại" value="{{ $customer->phonenumber}}">
            </div>
            <div class="col-md-12">
                <label for="txtadress">Địa chỉ giao hàng:</label>
                <input  name="address" class="u-full-width" type="text" placeholder="Vui lòng nhập địa chỉ" value="{{ $customer->address}}">
            </div>
            <div class="col-md-12">
                <label for="txtcontent">Chú thích:</label>
                <textarea name="content" id="" class="u-full-width">{{$customer->content}}</textarea>
            </div>

            <input class="btn btn-medium btn-dark btn-pill" type="submit" value="Cập nhật thông tin">
          </form>
    </div>
</div>
@include('shop.main.footer')
@endsection
@section('footer')
@include('shop.layout.foot')
@endsection
