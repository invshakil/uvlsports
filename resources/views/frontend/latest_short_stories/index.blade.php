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

                <div id="tweet" class="col-sm-8 col-md-9">


                    <h1 class="section-title">{{ $title }}</h1>

                    <div class="post box-design">
                        <div class="post-content">
                            <form class="form-horizontal" method="" action="#">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="title">Title:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" placeholder="Enter Title"
                                               name="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="link">Image Link:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="link" placeholder="Enter Image Url"
                                               name="link">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="description">Content:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" maxlength="300" id="description"
                                                  placeholder="Enter Content"
                                                  name="description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default"
                                                style="background-image: -webkit-linear-gradient(left, #21368a 10%, #555b72 60%, #21368a 100%); color: white">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>

                    </div>

                    <div class="section listing-news box-design">
                        <tweet-view :tweets="{{ json_encode($tweets) }}"></tweet-view>
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