@extends('admin.layout.app')
@section('main')
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="/">
                            <img src="{{ asset('/templates/shop/images/main-logo.png') }}" alt="Logo.jpg" height="50">
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="login/store" method="post">
                             @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember">Remember Me
                                </label>
                                <label>
                                    <a href="#">Quên mật khẩu?</a>
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng nhập</button>
                            <div class="social-login-content">
                               @include('admin.layout.arlert')
                            </div>
                        </form>
                        <div class="register-link">
                            <p>
                                Bạn chưa có tài khoản?
                                <a href="{{ asset('/admin/users/register') }}">Đăng kí tại đây</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection



