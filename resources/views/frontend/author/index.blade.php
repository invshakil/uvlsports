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

                <div class="col-sm-8 col-md-9">
                    <h1 class="section-title">Author List</h1>
                    <div class="author-listing">

                        <div class="authors">
                            <ul class="row">

                                @foreach($authors as $author)
                                

                                    <li class="col-sm-6 col-md-4">
                                        <div class="single-author">
                                            <div class="author-bg">
                                                @if(strpos($author->image, "http") !== false)

                                                    <img class="media-object" style="width: 100px; height: 100px"
                                                         src="{{ asset($author->image) }}"
                                                         alt="{{ $author->name }}">
                                                @else
                                                    @if($author->image == '')
                                                        <img class="media-object"
                                                             style="width: 100px; height: 100px"
                                                             src="https://www.infrascan.net/demo/assets/img/avatar5.png"
                                                             alt="{{ $author->name }}">
                                                    @else
                                                    
                                                    <img class="media-object"
                                                                 style="width: 100px; height: 100px"
                                                                 src="{{ asset($author->image) }}"
                                                                 alt="{{ $author->name }}">
                                                                 
                                                    @endif
                                                @endif
                                            </div>

                                            <div class="author-info">
                                                <h2>
                                                    <a href="{{ route('user.profile', ['id'=>$author->id, 'name'=> str_replace(' ','-', $author->name)]) }}">
                                                        {{ $author->name }}
                                                    </a>
                                                </h2>
                                                <p>Total Article: {{ count($author->articles) }}</p>
                                            </div>

                                            <div class="author-social">
                                                <ul class="list-inline social-icons">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div><!-- single-author -->
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div><!-- author-listing -->

                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            {{ $authors->links() }}
                        </ul>
                    </div>
                </div><!--/.col-sm-9 -->

                <div class="col-sm-4 col-md-3">
                    <div id="sitebar">


                    @include('frontend.follow_us')
                    <!--/#widget-->

                        <div class="widget">
                            <h1 class="section-title title">This is Rising!</h1>
                            <ul class="post-list">
                                @include('frontend.latest')
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