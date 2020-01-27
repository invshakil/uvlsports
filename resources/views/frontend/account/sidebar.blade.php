@php

    $published = count(App\Article::where('user_id', auth() -> user() -> id)->where('status', 1)->get()) ;
    $pending = count(App\Article::where('user_id', auth() -> user() -> id)->where('status', 0)->get()) ;
    $favorites = count(App\Favorite::where('user_id', auth() -> user() -> id)->get()) ;

@endphp

<aside>
    <div class="inner-box">
        <div class="user-panel-sidebar">

            <div class="collapse-box">
                <h5 class="collapse-title no-border">
                     আমার একাউন্ট
                    <a href="#MyClassified" data-toggle="collapse" class="pull-right"><i
                                class="fa fa-angle-down"></i></a>
                </h5>

                <div class="panel-collapse collapse in" id="MyClassified">
                    <ul>
                        <li>
                            <a class="@if(request()->url() == route('account')) active @endif"
                               href="{{ route('account') }}">
                                <i class="fa fa-home"></i>  হোম
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.collapse-box  -->

            <div class="collapse-box">
                <h5 class="collapse-title">
                     আপনার লেখা ম্যানেজ করুন &nbsp;
                    <a href="#MyAds" data-toggle="collapse" class="pull-right"><i
                                class="fa fa-angle-down"></i></a>
                </h5>
                <div class="panel-collapse collapse in" id="MyAds">
                    <ul class="acc-list">
                        <!-- Account Info -->

                        <li>
                            <a class="@if(request()->url() == route('create.article')) active @endif"
                               href="{{ route('create.article') }}">
                                <i class="fa fa-edit"></i> নতুন লেখা সাবমিট করুন

                            </a>
                        </li>

                        <li>
                            <a class="@if(request()->url() == route('my.articles')) active @endif"
                               href="{{ route('my.articles') }}">
                                <i class="fa fa-edit"></i>  আমার প্রকাশিত লেখা
                                <span class="badge">{{ $published }}</span>
                            </a>
                        </li>

                        <li>
                            <a class="@if(request()->url() == route('pending.articles')) active @endif"
                               href="{{ route('pending.articles') }}">
                                <i class="fa fa-eject"></i>  অপ্রকাশিত লেখা
                                <span class="badge">{{ $pending }}</span>
                            </a>
                        </li>

                        <li>
                            <a class="@if(request()->url() == route('favorite.articles')) active @endif"
                               href="{{ route('favorite.articles') }}">
                                <i class="fa fa-heart"></i> আপনার প্রিয় লেখাগুলো
                                <span class="badge">{{ $favorites }}</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
            <!-- /.collapse-box  -->


        </div>
    </div>
    <!-- /.inner-box  -->
</aside>