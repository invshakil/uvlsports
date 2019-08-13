@extends('frontend.index')

@section('title')
    {{ $title }}
@endsection

@section('after_style')
    <link href="{{ asset('frontend/css/account.css') }}" rel="stylesheet">

    <style>
        .article-submit {
            padding: 20px 5px 20px 5px;
        }

        @media only screen and (min-width: 900px) {
            .inner-body, .inner-box {
                min-height: 700px;
            }
        }
    </style>
@endsection

@section('content')

    <div class="container">

        <div class="section account">
            <div class="row">
                <div class="col-sm-3 page-sidebar">
                    @include('frontend.account.sidebar')
                </div>
                <!--/.page-sidebar-->

                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class=" fa fa-edit"></i> Account Settings </h2>


                        @if(Session::has('message'))
                            <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('message') !!}</em></div>
                        @endif

                        <div class="article-submit">

                            <form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input title="" type="text" name="name" value="{{ auth()->user()->name }}"
                                           class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Update Profile Picture</label>

                                    <input type="file" name="image" class="form-control" onchange="readURL(this);">

                                </div>

                                <div class="form-group">
                                    @if(strpos(auth()->user()->image, "http") !== false)

                                        <img id="blah" class="media-object" style="width: 200px;;"
                                             src="{{ asset(auth()->user()->image) }}"
                                             alt="{{ auth()->user()->name }}">
                                    @else
                                        @if(auth()->user()->image == '')
                                            <img id="blah" class="media-object"
                                                 style="width: 200px;;"
                                                 src="https://www.infrascan.net/demo/assets/img/avatar5.png"
                                                 alt="{{ auth()->user()->name }}">
                                        @else
                                            @if(file_exists(public_path().auth()->user()->image))
                                                <img id="blah" class="media-object"
                                                     style="width: 200px;;"
                                                     src="{{ asset(auth()->user()->image) }}"
                                                     alt="{{ auth()->user()->name }}">
                                            @else
                                                <img id="blah" class="media-object"
                                                     style="width: 200px; "
                                                     src="https://www.infrascan.net/demo/assets/img/avatar5.png"
                                                     alt="{{ auth()->user()->name }}">

                                            @endif
                                        @endif
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="name">Intro</label>
                                    <textarea title="" name="bio" class="form-control"
                                              required="required">{{ auth()->user()->bio }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Facebook</label>
                                    <input title="" type="text" name="facebook" value="{{ auth()->user()->user_fb }}"
                                           class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="name">Twitter</label>
                                    <input title="" type="text" name="twitter" value="{{ auth()->user()->user_tw }}"
                                           class="form-control" required="required">
                                </div>


                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>

                        </div>


                    </div>
                </div><!--/.section-->
            </div>
        </div>
    </div>

@endsection

@section('after_script')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection