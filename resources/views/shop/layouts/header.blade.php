<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{setting()->site_desc_en}}">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="{{setting()->keyword}}">

    <title>
        {{setting('site_name_'.app('l'))}}--{{empty($title)? '' : $title }}  </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="">
    <link rel="shortcut icon" href="{{ Storage::url( setting()->icon ) }}">

    @stack('css')
    @if(app('l') == 'ar')


        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet"> --}}

    @endif
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="{{url('shop/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('shop/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('shop/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('shop/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('shop/css/owl.theme.css')}}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{url('shop/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{url('shop/css/custom.css')}}" rel="stylesheet">

    <script src="{{url('shop/js/respond.min.js')}}"></script>
    <script src="{{url('shop/js/share-btn.js')}}"></script>
    @toastr_css
    @if(app('l') == 'ar')
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet">

        <link href="{{url('shop/css/rtl.css')}}" rel="stylesheet">
        <style type="text/css">
            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: right;
            }

            html, body, h1, h2, h3, h4, h5, h6, label, div, p, span {
                font-family: 'Cairo', sans-serif;
            }
        </style>
    @endif

</head>
