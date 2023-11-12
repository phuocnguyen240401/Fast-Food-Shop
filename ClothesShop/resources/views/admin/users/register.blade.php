@extends('admin.layout.app')
@section('main')
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{ asset('/templates/shop/images/main-logo.png') }}" alt="CoolAdmin">
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="au-input au-input--full" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ Email</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Nhập mật khẩu</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input class="au-input au-input--full" type="password" name="repassword" placeholder="Password">
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="aggree">Đồng ý các điều khoản và chính sách
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng kí</button>
                            <div class="social-login-content">
                                @include('admin.layout.arlert')
                             </div>
                        </form>
                        <div class="register-link">
                            <p>
                                Đã có tài khoản?
                                <a href="{{ asset('admin/users/login') }}">Đăng nhập</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
