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
            <h1 class="section-title title"> আমাদের সাথে যোগাযোগ করুন</h1>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-9">
                <div class="contact-us">

                    <div class="map-section">
                        <div id="gmap" data-address="USA"></div>
                    </div>

                    <div class="contact-info">
                        <h1 class="section-title title"> যোগাযোগের প্রয়োজনীয় তথ্যসমূহ</h1>
                        <ul class="list-inline">
                            <li class="box-design">
                                <h2>Comilla</h2>
                                <address>
                                    {{--23-45A, Silictown <br>Great Country--}}
                                    <p><strong>Name:</strong> Shakil</p>
                                    <p class="contact-mail"><strong>Email:</strong> <a href="#">inverse.shakil@gmail.com</a>
                                    </p>
                                    <p><strong>Call:</strong> +8801675332265</p>
                                </address>
                            </li>
                            <li class="box-design">
                                <h2>Dhaka</h2>
                                <address>
                                    {{--245 North Street, <br>New York, NY--}}
                                    <p><strong>Name:</strong> Rahik</p>
                                    <p class="contact-mail"><strong>Email:</strong> <a href="#">top2dcutlet@gmail.com</a></p>
                                    <p><strong>Call:</strong> +8801822333956</p>
                                </address>
                            </li>

                        </ul>
                    </div>
                    <div class="message-box box-design">
                        <h1 class="section-title title">Drop Your Message</h1>
                        <form id="comment-form" name="comment-form" method="post"
                              action="{{ route('submit.contact.form') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="your_name">Name</label>
                                        <input type="text" id="your_name" name="your_name"
                                               value="{{ old('your_name') }}"
                                               class="form-control @if ($errors->has('your_name')) has-error @endif">

                                        @if ($errors->has('your_name'))
                                            <div class="errors">{{ $errors->first('your_name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="your_email">Email</label>
                                        <input type="text" id="your_email" name="your_email"
                                               value="{{ old('your_email') }}"
                                               class="form-control @if ($errors->has('your_email')) has-error @endif">
                                        @if ($errors->has('your_email'))
                                            <div class="errors">{{ $errors->first('your_email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                               class="form-control @if ($errors->has('subject')) has-error @endif">
                                        @if ($errors->has('subject'))
                                            <div class="errors">{{ $errors->first('subject') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="your_comment">Your Text</label>
                                        <textarea name="your_comment" id="your_comment"
                                                  class="form-control @if ($errors->has('your_comment')) has-error @endif"
                                                  rows="5">{{ old('your_comment') }}</textarea>
                                        @if ($errors->has('your_comment'))
                                            <div class="errors">{{ $errors->first('your_comment') }}</div>
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- contact-us -->
            </div>
            <div class="col-md-3 col-sm-4">
                <div id="sitebar">
                    @include('frontend.follow_us')

                    <div class="widget">
                        <h1 class="section-title title">সর্বশেষ লেখাসমূহ</h1>
                        <ul class="post-list">
                           @include('frontend.latest')
                        </ul>
                    </div><!--/#widget-->

                </div><!--/#sitebar-->
            </div>
        </div><!-- row -->
    </div>

@endsection

@section('after_script')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDBVF1z5zP0UpwGRPEpLWdY3eo8YnPy1-E"></script>
    
    <script type="text/javascript" src="{{ asset('frontend') }}/js/gmaps.js"></script>
    <script type="text/javascript">
        (function () {

            var map;

            map = new GMaps({
                el: '#gmap',
                lat: 23.4607,
                lng: 91.180299,
                scrollwheel: false,
                zoom: 9,
                zoomControl: true,
                panControl: false,
                streetViewControl: false,
                mapTypeControl: false,
                overviewMapControl: false,
                clickable: false
            });

            var image = '';
            map.addMarker({
                lat: 23.4607,
                lng: 91.1809,
                icon: image,
                animation: google.maps.Animation.DROP,
                verticalAlign: 'bottom',
                horizontalAlign: 'center',
                backgroundColor: '#d3cfcf',
                infoWindow: {
                    content: '<div class="map-info"><address>UVL Sports<br />304, Kazi Para Road, Comilla South Sadar <br />Comilla</address></div>',
                    borderColor: 'red',
                }
            });

            var styles = [

                {
                    "featureType": "road",
                    "stylers": [
                        {"color": "#c1c1c1"}
                    ]
                }, {
                    "featureType": "water",
                    "stylers": [
                        {"color": "#f1f1f1"}
                    ]
                }, {
                    "featureType": "landscape",
                    "stylers": [
                        {"color": "#e3e3e3"}
                    ]
                }, {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {"color": "#808080"}
                    ]
                }, {
                    "featureType": "poi",
                    "stylers": [
                        {"color": "#dddddd"}
                    ]
                }, {
                    "elementType": "labels.text",
                    "stylers": [
                        {"saturation": 1},
                        {"weight": 0.1},
                        {"color": "#7f8080"}
                    ]
                }

            ];

            map.addStyle({
                styledMapName: "Styled Map",
                styles: styles,
                mapTypeId: "map_style"
            });

            map.setStyle("map_style");
        }());
    </script>
@endsection