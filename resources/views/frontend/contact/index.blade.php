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
            <h1 class="section-title title">Contact Us</h1>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-9">
                <div class="contact-us">
                    <div class="map-section">
                        <div id="gmap" data-address="USA"></div>
                    </div>
                    <div class="contact-info">
                        <h1 class="section-title title">Contact Information</h1>
                        <ul class="list-inline">
                            <li>
                                <h2>Chittagong</h2>
                                <address>
                                    {{--23-45A, Silictown <br>Great Country--}}
                                    <p class="contact-mail"><strong>Email:</strong> <a href="#">inverse.shakil@gmail.com</a>
                                    </p>
                                    <p><strong>Call:</strong> +8801675332265</p>
                                </address>
                            </li>
                            <li>
                                <h2>Dhaka</h2>
                                <address>
                                    {{--245 North Street, <br>New York, NY--}}
                                    <p class="contact-mail"><strong>Email:</strong> <a href="#">top2dcutlet@gmail.com</a></p>
                                    <p><strong>Call:</strong> +8801822333956</p>
                                </address>
                            </li>

                        </ul>
                    </div>
                    <div class="message-box">
                        <h1 class="section-title title">Drop Your Message</h1>
                        <form id="comment-form" name="comment-form" method="post">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="subject" name="subject" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="comment">Your Text</label>
                                        <textarea name="comment" id="comment" required="required" class="form-control"
                                                  rows="5"></textarea>
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
                        <h1 class="section-title title">Latest Articles</h1>
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
                lat: 22.3815544,
                lng: 91.8407592,
                scrollwheel: false,
                zoom: 8,
                zoomControl: true,
                panControl: false,
                streetViewControl: false,
                mapTypeControl: false,
                overviewMapControl: false,
                clickable: false
            });

            var image = '';
            map.addMarker({
                lat: 22.3815544,
                lng: 91.8407592,
                icon: image,
                animation: google.maps.Animation.DROP,
                verticalAlign: 'bottom',
                horizontalAlign: 'center',
                backgroundColor: '#d3cfcf',
                infoWindow: {
                    content: '<div class="map-info"><address>UVL Sports<br />39, Road 2, B Block, Chandgaon <br />Chittagong</address></div>',
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