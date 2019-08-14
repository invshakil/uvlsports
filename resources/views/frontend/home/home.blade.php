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

        {{--SLIDER --}}

        @include('frontend.home.slider')


        <div class="section">
            <div class="row">
                {{--LATEST--}}
                @include('frontend.home.latest')

                <div class="col-md-3 col-sm-4">
                    <div id="sitebar">
                        @include('frontend.follow_us')


                        <div class="widget">
                            <h1 class="section-title title">Popular Articles!</h1>
                            {{--POPULAR--}}
                            @include('frontend.popular')

                        </div><!--/#widget-->


                        {{--<div class="widget weather-widget">--}}
                            {{--<div id="weather-widget"></div>--}}
                        {{--</div><!--/#widget-->--}}


                    </div><!--/#sitebar-->
                </div>
            </div>
        </div>

    </div>

@endsection

@section('after_script')




@endsection