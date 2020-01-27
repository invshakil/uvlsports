@php
    $league_categories = \Illuminate\Support\Facades\Cache::remember('league_categories', 3600, function (){
        return App\Category::where('is_league', 1) -> where('status', 1) -> get();
    });
    $other_categories = \Illuminate\Support\Facades\Cache::remember('other_categories', 3600, function (){
        return  App\Category ::where('is_league', 0) -> where('status', 1) -> get();
    });

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
                        <a href="{{ route('article.by.category', ['slug'=>str_replace(' ', '-', $category->bangla_name)])  }}">{{ $category->bangla_name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="politics dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                বিশেষ ক্যাটাগরি
            </a>
            <ul class="dropdown-menu">
                @foreach($other_categories as $other_category)
                    <li>
                        <a href="{{ route('article.by.category', ['slug'=>str_replace(' ', '-', $other_category->bangla_name)])  }}">{{ $other_category->bangla_name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="home">
            <a href="{{ url('category/ক্রিকেট') }}">ক্রিকেট</a>
        </li>

        <li class="home">
            <a href="{{ url('লেখকদের-তালিকা') }}">লেখকদের প্রোফাইল</a>
        </li>

        <li class="home">
            <a href="{{ url('খেলার-সর্বশেষ-সংবাদ') }}">খেলার সর্বশেষ সংবাদ</a>
        </li>

        <li class="home">
            <a href="{{ url('খেলার-সময়সূচী') }}">খেলার সময়সূচী</a>
        </li>

        <li class="home">
            <a href="{{ url('যোগাযোগ') }}">যোগাযোগ</a>
        </li>
        <li class="home">
            <a href="{{ url('আমাদের-সম্পর্কে') }}">আমাদের টিম</a>
        </li>
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