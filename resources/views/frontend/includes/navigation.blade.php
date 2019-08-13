@php
    $league_categories = App\Category ::where('is_league', 1) -> where('status', 1) -> get();
    $other_categories = App\Category ::where('is_league', 0) -> where('status', 1) -> get();

@endphp

<nav id="mainmenu" class="navbar-left collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="home">
            <a href="{{ route('home') }}">হোম</a>
        </li>

        <li class="business dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">ইউরোপিয়ান
                লীগ</a>
            <ul class="dropdown-menu">
                @foreach($league_categories as $category)
                    <li>
                        <a href="{{ route('article.by.category', ['slug'=>str_replace(' ', '-', $category->name)])  }}">{{ $category->bangla_name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="politics dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">এফএফবিডি
                স্পেশাল</a>
            <ul class="dropdown-menu">
                @foreach($other_categories as $other_category)
                    <li>
                        <a href="{{ route('article.by.category', ['slug'=>str_replace(' ', '-', $other_category->name)])  }}">{{ $other_category->bangla_name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="home">
            <a href="{{ url('category/cricket') }}">ক্রিকেট</a>
        </li>


        {{--<li class="world dropdown mega-cat-dropdown">--}}
            {{--<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">সেরা লেখক</a>--}}
            {{--<div class="dropdown-menu mega-cat-menu">--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<div class="post medium-post">--}}
                                {{--<div class="entry-header">--}}
                                    {{--<div class="entry-thumbnail">--}}
                                        {{--<img class="img-responsive" src="{{ asset('frontend') }}/images/post/2.jpg"--}}
                                             {{--alt=""/>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="post-content">--}}
                                    {{--<div class="entry-meta">--}}
                                        {{--<ul class="list-inline">--}}
                                            {{--<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Nov 5,--}}
                                                    {{--2015 </a></li>--}}
                                            {{--<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>--}}
                                            {{--<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<h2 class="entry-title">--}}
                                        {{--<a href="news-details.html">Apple may be preparing for new Beats radio--}}
                                            {{--stations</a>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}
                            {{--</div><!--/post-->--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<div class="post medium-post">--}}
                                {{--<div class="entry-header">--}}
                                    {{--<div class="entry-thumbnail">--}}
                                        {{--<img class="img-responsive" src="{{ asset('frontend') }}/images/post/6.jpg"--}}
                                             {{--alt=""/>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="post-content">--}}
                                    {{--<div class="entry-meta">--}}
                                        {{--<ul class="list-inline">--}}
                                            {{--<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Nov 5,--}}
                                                    {{--2015 </a></li>--}}
                                            {{--<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>--}}
                                            {{--<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<h2 class="entry-title">--}}
                                        {{--<a href="news-details.html">Why is the media so afraid of Facebook?</a>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}
                            {{--</div><!--/post-->--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<div class="post medium-post">--}}
                                {{--<div class="entry-header">--}}
                                    {{--<div class="entry-thumbnail">--}}
                                        {{--<img class="img-responsive" src="{{ asset('frontend') }}/images/post/3.jpg"--}}
                                             {{--alt=""/>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="post-content">--}}
                                    {{--<div class="entry-meta">--}}
                                        {{--<ul class="list-inline">--}}
                                            {{--<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Nov 5,--}}
                                                    {{--2015 </a></li>--}}
                                            {{--<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>--}}
                                            {{--<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<h2 class="entry-title">--}}
                                        {{--<a href="news-details.html">Samsung Pay will support online shopping</a>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}
                            {{--</div><!--/post-->--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<div class="post medium-post">--}}
                                {{--<div class="entry-header">--}}
                                    {{--<div class="entry-thumbnail">--}}
                                        {{--<img class="img-responsive" src="{{ asset('frontend') }}/images/post/5.jpg"--}}
                                             {{--alt=""/>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="post-content">--}}
                                    {{--<div class="entry-meta">--}}
                                        {{--<ul class="list-inline">--}}
                                            {{--<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Nov 5,--}}
                                                    {{--2015 </a></li>--}}
                                            {{--<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>--}}
                                            {{--<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<h2 class="entry-title">--}}
                                        {{--<a href="news-details.html">The best games for your phone</a>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}
                            {{--</div><!--/post-->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</li>--}}

        <li class="home">
            <a href="{{ url('authors-list') }}">লেখকদের প্রোফাইল</a>
        </li>

        {{--<li class="home">--}}
            {{--<a href="{{ url('latest-short-stories') }}">খেলার সর্বশেষ সংবাদ</a>--}}
        {{--</li>--}}

        <li class="home">
            <a href="{{ url('tv-schedule') }}">খেলার সময়সূচী</a>
        </li>

        <li class="home">
            <a href="{{ url('contact-us') }}">যোগাযোগ</a>
        </li>
        {{--<li class="home">--}}
            {{--<a href="{{ url('about-us') }}">আমাদের টিম</a>--}}
        {{--</li>--}}
    </ul>
</nav>

<style>
    .nav > li > a {
        padding: 10px 12px !important;
    }
    .alert-danger{
        background-color: red;
        color: white;
    }
    .close{
        color: #333!important;
    text-shadow: 0 1px 0 #333;
    filter: alpha(opacity=20);
    opacity: 2.5;
    }
</style>