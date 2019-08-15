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
                                <div class="form-group @if ($errors->has('bio')) has-error @endif">
                                    <label for="name">Name</label>
                                    <input title="" type="text" name="name"
                                           value="{{ old('name', auth()->user()->name) }}"
                                           class="form-control" required="required">
                                    @if ($errors->has('name'))
                                        <div class="errors">{{ $errors->first('name') }}</div>
                                    @endif
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

                                <div class="form-group @if ($errors->has('bio')) has-error @endif">
                                    <label for="bio">Intro</label>
                                    <textarea title="" name="bio" class="form-control"
                                              required="required">{{ old('name', auth()->user()->bio) }}</textarea>
                                    @if ($errors->has('bio'))
                                        <div class="errors">{{ $errors->first('bio') }}</div>
                                    @endif
                                </div>

                                <div class="form-group @if ($errors->has('facebook')) has-error @endif">
                                    <label for="facebook">Facebook</label>
                                    <input title="" type="url" name="facebook" value="{{ old('name', auth()->user()->user_fb) }}"
                                           class="form-control" required="required">
                                    @if ($errors->has('facebook'))
                                        <div class="errors">{{ $errors->first('facebook') }}</div>
                                    @endif
                                </div>

                                <div class="form-group @if ($errors->has('twitter')) has-error @endif">
                                    <label for="twitter">Twitter</label>
                                    <input title="" type="url" name="twitter" value="{{ old('name', auth()->user()->user_tw) }}"
                                           class="form-control" >
                                    @if ($errors->has('twitter'))
                                        <div class="errors">{{ $errors->first('twitter') }}</div>
                                    @endif
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