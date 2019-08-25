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
                        <h1 class="section-title">{{ $category_info->name }}</h1>
                        <div class="section listing-news">

                            @foreach($articles as $article)

                                <div class="post box-design">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                                <img class="img-responsive"
                                                     src="{{ $article->medium_image }}"
                                                     alt="{{ $article->title }}"/>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a href="#"><i
                                                                class="fa fa-clock-o"></i> {{ $article->created_at->format('d M Y') }}
                                                    </a></li>
                                                <li class="views"><a href="#"><i
                                                                class="fa fa-eye"></i>{{ $article->hit_count }}</a></li>
                                                <li class="loves">
                                                    @if(Auth::check())
                                                        @php $status = $article->favByUser($article->favorites, auth()->user()->id); @endphp
                                                        <a href="javascript:void(null)">
                                                            <i class="fa fa-heart-o save-favorite @if($status == 1) fav-color @endif"
                                                               id="fav{{ $article->id }}"
                                                               data-id="{{ $article->id }}"> {{ $article->favorites_count }}</i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('login') }}" class="save-favorite"
                                                           onclick="return confirm('To save as favorite, you will have to be logged in. Proceed?')">
                                                            <i class="fa fa-heart-o"></i> {{ $article->favorites_count }}
                                                        </a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="{{ route('article.details', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->title }}</a>
                                        </h2>
                                        <div class="entry-content">
                                            <p align="justify">
                                                @if(strlen($article->description) > 199)
                                                    {!! mb_substr(strip_tags($article->description), 0, strpos(strip_tags($article->description), ' ', 200)).' ...' !!}
                                                @else
                                                    {!! strLimit($article->meta_keyword, 200) !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div><!--/post-->

                            @endforeach
                        </div>
                    </div><!--/#site-content-->

                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            {{ $articles->links() }}
                        </ul>
                    </div>
                </div><!--/.col-sm-9 -->

                <div id="sticky" class="col-sm-3">
                    <div id="sitebar">


                        @include('frontend.follow_us')


                        <div class="widget">
                            <h1 class="section-title title">{{ $category_info->name }}তে জনপ্রিয়</h1>
                            <ul class="post-list">
                                @include('frontend.popular')
                            </ul>
                        </div><!--/#widget-->

                        <div class="widget weather-widget">
                            <div id="weather-widget"></div>
                        </div><!--/#widget-->
                    </div><!--/#sitebar-->
                </div>
            </div>
        </div><!--/.section-->
    </div>

@endsection

@section('after_script')

@endsection