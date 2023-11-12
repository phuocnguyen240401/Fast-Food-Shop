<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Title Page-->
<title>{{ $title }}</title>
<!-- Fontfaces CSS-->
<link href="{{ asset('templates/admin/css/font-face.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
<!-- Bootstrap CSS-->
<link href="{{ asset('templates/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

<!-- Vendor CSS-->
<link href="{{ asset('templates/admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('templates/admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="{{ asset('templates/admin/css/theme.css') }}" rel="stylesheet" media="all">
{{-- tiến hành sử dụng ajax --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- add css-->
@yield('head')
