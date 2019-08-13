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

        <div class="section">
            <div class="row">
                <div class="col-sm-9">

                    <div id="site-content" class="site-content">
                        <div class="page-breadcrumbs">
                            <h1 class="section-title">Author Profile</h1>
                        </div>
                        <div class="author-details">
                            <div class="author-heading">
                                <div class="author-profile">
                                    <div class="author-gravatar">
                                        @if(strpos($author_info->image, "http") !== false)

                                            <img class="media-object" style="width: 100px; height: 100px"
                                                 src="{{ asset($author_info->image) }}"
                                                 alt="{{ $author_info->name }}">
                                        @else
                                            @if($author_info->image == '')
                                                <img class="media-object"
                                                     style="width: 100px; height: 100px"
                                                     src="https://www.infrascan.net/demo/assets/img/avatar5.png"
                                                     alt="{{ $author_info->name }}">
                                            @else
                                               <img class="media-object"
                                                         style="width: 100px; height: 100px"
                                                         src="{{ asset($author_info->image) }}"
                                                         alt="{{ $author_info->name }}">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="author-name">
                                        <h1>{{ $author_info->name }}</h1>
                                        <p>{{ $author_info->email }}</p>
                                    </div>
                                    <div class="author-social">
                                        <p>Contact</p>
                                        <ul class="list-inline social-icons">
                                            @if($author_info->user_fb)
                                                <li><a href="{{ $author_info->user_fb }}" target="_blank"><i
                                                                class="fa fa-facebook"></i></a></li>
                                            @endif
                                            @if($author_info->user_tw)
                                                <li><a href="{{ $author_info->user_tw }}" target="_blank"><i
                                                                class="fa fa-twitter"></i></a></li>
                                            @endif
                                            @if($author_info->email)
                                                <li><a href="mailto:{{ $author_info->email }}" target="_blank"><i
                                                                class="fa fa-envelope"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="author-info">
                                <p>Total Article: {{ count($articles) }}</p>
                                <p>Total Article Hits: {{ $total_hit }} View</p>
                                <p>Earned Favorite: {{ $total_favorites }}</p>
                                <hr>
                                @if(isset($author_info->bio))
                                    <h3>About Me</h3>
                                    <hr>
                                    <p>{{ $author_info->bio }}</p>
                                @endif
                            </div>
                        </div>
                    </div><!--/#site-content-->

                    <div id="site-content" class="site-content" >
                        <h1 class="section-title">{{ $title }}'s Articles</h1>
                        <div class="section listing-news">


                            @foreach($articles as $article)

                                <div class="post" style="padding: 20px">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <img class="img-responsive"
                                                 src="{{ $article->full_image }}"
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
                                                <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="{{ route('article.details', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->title }}</a>
                                        </h2>
                                        <div class="entry-content">
                                            <p align="justify">{!! strLimit($article->description, 200) !!}</p>
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
                </div>

                <div class="col-sm-3" id="sticky">
                    <div id="sitebar">

                        @include('frontend.follow_us')

                        <div class="widget">
                            <h1 class="section-title title">{{ $title }}'s Popular Article</h1>
                            <ul class="post-list">
                                @include('frontend.popular')

                            </ul>
                        </div><!--/#widget-->
                    </div><!--/#sitebar-->
                </div>
            </div>
        </div><!--/.section-->
    </div>

@endsection

@section('after_script')

@endsection