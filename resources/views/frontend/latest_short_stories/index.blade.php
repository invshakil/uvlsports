@extends('frontend.index')


@section('title') {{ $title }} @endsection
@section('image') {{ $image }} @endsection
@section('description') {{ $description }} @endsection
@section('keyword') {{ $keyword }} @endsection
@section('author') {{ $author }} @endsection


@section('after_style')
    <style>
        .btn-custom {
            background-image: -webkit-linear-gradient(left, #21368a 10%, #555b72 60%, #21368a 100%);
            color: white
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="page-breadcrumbs">

        </div>
        <div class="section">
            <div class="row">

                <div id="tweet" class="col-sm-8 col-md-9">

                    <div class="section listing-news box-design">
                        <tweet-view :tweets="{{ json_encode($tweets) }}" :title="{{ json_encode($title) }}"
                                    :is_allowed="{{ json_encode($isAllowed) }}"></tweet-view>
                    </div>

                    <div class="pagination-wrapper">
                        <ul class="pagination">

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
    <script src="{{ asset('js/modules/tweets.js') }}"></script>
@endsection