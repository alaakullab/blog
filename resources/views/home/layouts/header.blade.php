<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
<head>

    <title>{{setting('site_name_'.app('l'))}}--{{$title}}</title>
    <!--

    Known Template

    http://www.templatemo.com/tm-516-known

    -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="{{setting()->site_desc_en}}">
              <meta name="keywords" content="{{setting()->keyword}}">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <link rel="stylesheet" href="{{url('blog/-ltr/')}}/css/bootstrap.min.css">

    <!-- x-editable (bootstrap 3) -->
    <script src="{{url('blog/-ltr/')}}/js/jquery.js"></script>
    <script src="{{url('blog/-ltr/')}}/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{url('blog/-ltr/')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('blog/-ltr/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{url('blog/-ltr/')}}/css/owl.theme.default.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{url('blog/-ltr/')}}/css/templatemo-style.css">
    <link rel="shortcut icon" href="{{ Storage::url( setting()->icon ) }}">
    @if(app('direction') == '-rtl')
        <link rel="stylesheet" href="{{url('blog/-rtl')}}/css/custom.css">
    @endif
    <link href="https://vitalets.github.io/x-editable/assets/select2/select2.css" rel="stylesheet">
    <script src="https://vitalets.github.io/x-editable/assets/select2/select2.js"></script>
    @stack('css')

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>
