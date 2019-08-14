<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!--title-->

<title>@yield('title') | {{ config('app.name') }}</title>
<meta property="fb:app_id" content="287256215072572">
<meta property="og:site_name" content="UVL Sports">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('title') | {{ config('app.name') }}">

<meta property="og:image" content="@yield('image')">
<meta property="og:description"
      content="@yield('description')">
<meta name="description"
      content="@yield('description')">

<meta name="keyword"
      content="@yield('keyword')">
<meta name="author" content="@yield('author')">

<meta property="og:locale" content="en_US">
<meta property="og:type" content="@if(isset($type)) {{$type}} @else website @endif">

<!--CSS-->

<!--Google Fonts-->
<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!--[if lt IE 9]>
<script src="{{ asset('frontend') }}/js/html5shiv.js"></script>
<script src="{{ asset('frontend') }}/js/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="{{ asset('frontend') }}/images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144"
      href="{{ asset('frontend') }}/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
      href="{{ asset('frontend') }}/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
      href="{{ asset('frontend') }}/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="{{ asset('frontend') }}/images/ico/apple-touch-icon-57-precomposed.png">


<style>
    .pagination li a:hover, .pagination .active > a, .pagination .active > a:focus, .pagination .active > a:hover, .subscribe-me button, .btn-danger {
        border-color: #ed1c24;
    }

    .pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
        color: #fff;
        background-color: #27292a;
        border: 1px solid #0e0f0f;
        padding: 12px 15px;
        position: relative;
        float: left;
        margin-left: -1px;
        line-height: 1.42857143;
        text-decoration: none;
    }

    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
        color: #fff;
        background-color: #ed1c24;
        border: 1px solid #ed1c24;
        padding: 12px 15px;
        position: relative;
        float: left;
        margin-left: -1px;
        line-height: 1.42857143;
        text-decoration: none;
    }

    .entry-content blockquote{
        border-left: 5px solid #f90606;
        background: #eff2fd;
    }
</style>

