@extends('frontend.index')


@section('title') {{ $title }} @endsection
@section('image') {{ $image }} @endsection
@section('description') {{ $description }} @endsection
@section('keyword') {{ $keyword }} @endsection
@section('author') {{ $author }} @endsection


@section('after_style')

@endsection

@section('content')

    <div class="container">
        <div class="page-breadcrumbs">


        </div>
        <div class="section">
            <div class="row">
                <div class="col-sm-9">
                    <div id="site-content" class="site-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="left-content">
                                    <div class="details-news">
                                        @php $categories = explode(',',$info->category_id); @endphp
                                        {{--<h1 class="section-title">বিস্তারিত</h1>--}}
                                        <div class="post">
                                            @if($info->image != null && file_exists(asset('image_upload/post_image/'.$info->image)))
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <img class="img-responsive"
                                                             src="{{ asset('image_upload/post_image/'.$info->image) }}"
                                                             style="margin: 0 auto; padding-top: 10px;"
                                                             alt="{{ $info->title }}"/>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="post-content">

                                                <div class="entry-meta">
                                                    <ul class="list-inline">
                                                        <li class="posted-by"><i class="fa fa-user"></i> by <a
                                                                    href="{{ route('user.profile', ['id'=>$info->author->id, 'name'=> str_replace(' ','-', $info->author->name)]) }}">{{ $info->author->name }}</a>
                                                        </li>
                                                        <li class="publish-date"><a href="#"><i
                                                                        class="fa fa-clock-o"></i> {{ $info->created_at->format('d M Y') }}
                                                            </a>
                                                        </li>
                                                        <li class="views"><a href="#"><i
                                                                        class="fa fa-eye"></i>{{ $info->hit_count }}</a>
                                                        </li>
                                                        <li class="loves">
                                                            @if(Auth::check())
                                                                @php $status = $info->favByUser($info->id, auth()->user()->id); echo auth()->user()->id;@endphp
                                                                <a href="javascript:void(null)">
                                                                    <i class="fa fa-heart-o save-favorite @if($status == 1) fav-color @endif"
                                                                       id="fav{{ $info->id }}"
                                                                       data-id="{{ $info->id }}"> {{ $info->favorites_count }}</i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('login') }}" class="save-favorite"
                                                                   onclick="return confirm('To save as favorite, you will have to be logged in. Proceed?')">
                                                                    <i class="fa fa-heart-o"></i> {{ $info->favorites_count }}
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li class="comments"><i class="fa fa-tags-o"></i><a href="#">
                                                                @foreach($categories as $category)
                                                                    <a class="btn btn-success" style="color:#fff"
                                                                       href="#">{{ $info->category($category) }}</a>
                                                                @endforeach
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h2 class="entry-title">
                                                    {{ $info->title }}
                                                </h2>
                                                <div class="entry-content" style="text-align: justify">
                                                    {!! $info->description !!}


                                                    <ul class="list-inline share-link">
                                                        <li><a target="_blank"
                                                               href="http://www.facebook.com/sharer.php?u={{url()->current()}}"><img
                                                                        src="{{ asset('frontend') }}/images/others/s1.png"
                                                                        alt=""/></a></li>
                                                        <li><a target="_blank"
                                                               href="http://twitter.com/home?status={{url()->current()}}"><img
                                                                        src="{{ asset('frontend') }}/images/others/s2.png"
                                                                        alt=""/></a></li>
                                                        <li><a target="_blank"
                                                               href="https://plus.google.com/share?url={{url()->current()}}"><img
                                                                        src="{{ asset('frontend') }}/images/others/s4.png"
                                                                        alt=""/></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!--/post-->
                                    </div><!--/.section-->
                                </div><!--/.left-content-->
                            </div>


                        </div>
                    </div><!--/#site-content-->
                    <div class="row">
                        <div class="col-sm-12">


                            <div class="comments-wrapper">
                                <h1 class="section-title title">লেখক পরিচিতি</h1>
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#">

                                                @if(strpos($info->author->image, "http") !== false)

                                                    <img class="media-object" style="width: 100px; height: 100px"
                                                         src="{{ asset($info->author->image) }}"
                                                         alt="{{ $info->author->name }}">
                                                @else
                                                    @if($info->author->image == '')
                                                        <img class="media-object"
                                                             style="width: 100px; height: 100px"
                                                             src="https://www.infrascan.net/demo/assets/img/avatar5.png"
                                                             alt="{{ $info->author->name }}">
                                                    @else
                                                        <img class="media-object"
                                                             style="width: 100px; height: 100px"
                                                             src="{{ asset($info->author->image) }}"
                                                             alt="{{ $info->author->name }}">
                                                    @endif
                                                @endif
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <h2 style="display: block"><a
                                                        href="{{ route('user.profile', ['id'=>$info->author->id, 'name'=> str_replace(' ','-', $info->author->name)]) }}">{{ $info->author->name }}</a>
                                            </h2>
                                            <h3 class="date" style="display: block">Last Active <a
                                                        href="#">{{ $info->author->created_at->format('d M Y') }}</a>
                                            </h3>

                                            @if(isset($info->author->user_bio))

                                                {{ $info->author->user_bio }}

                                            @endif

                                        </div>
                                    </li>

                                </ul>

                            </div>

                            <div class="section">
                                <h1 class="section-title">More in {{ $info->category($categories[0]) }}</h1>
                                <div class="row">

                                    @foreach($related_articles as  $article)
                                        <div class="col-md-4">
                                            <div class="post medium-post" style="max-height: 260px; min-height: 260px;">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <img class="img-responsive"
                                                             src="{{ asset('image_upload/post_image/resized/'.$article->image) }}"
                                                             style="max-height: 130px; margin: 0px auto"
                                                             alt=""/>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a href="#"><i
                                                                            class="fa fa-clock-o"></i> {{ $article->created_at->format('d-M-Y') }}
                                                                </a></li>
                                                            <li class="views"><a href="#"><i
                                                                            class="fa fa-eye"></i>{{ $article->hit_count }}
                                                                </a>
                                                            </li>
                                                            <li class="loves"><a href="#"><i
                                                                            class="fa fa-heart-o"></i>278</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a href="{{ route('article.details', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->title }}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->

                                        </div>
                                    @endforeach

                                </div>
                            </div><!--/.section -->
                        </div>
                    </div>
                </div><!--/.col-sm-9 -->

                @include('frontend.article.right_sidebar')
            </div>
        </div><!--/.section-->
    </div>

@endsection

@section('after_script')
    <script>
        $(document).ready(function () {
            $('.entry-content img').addClass('img-responsive img-center img-thumbnail').css({
                width: 'auto',
                height: 'auto',
                margin: '0 auto',
                display: 'block'
            });

        });
    </script>
@endsection