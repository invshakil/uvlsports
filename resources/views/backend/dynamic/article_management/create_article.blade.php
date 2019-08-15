@extends('backend.index')

@section('after_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets') }}/libs/bootstrap-tokenfield/css/bootstrap-tokenfield.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets') }}/assets/styles/libs/bootstrap-tokenfield/bootstrap-tokenfield.min.css">

    <style>
        .badge {
            white-space: normal !important;
            line-height: 18px !important;
        }
    </style>
@endsection

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4 id="form-validation-basic-demo">Enter Article Information</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-default form-group @if ($errors->has('title')) has-danger @endif">
                                                <div class="card-header form-control-label">
                                                    Article Title
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <input type="text"
                                                               name="title"
                                                               value="{{ old('title') }}"
                                                               class="form-control form-control-danger"
                                                               placeholder="Enter Title">

                                                        @if ($errors->has('title'))
                                                            <div class="has-error">
                                                                <strong>* {{ $errors->first('title') }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="panel panel-default form-group @if ($errors->has('image')) has-danger @endif">
                                                <div class="card-header form-control-label">
                                                    Article Image
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary ks-btn-file">
                                                            <span class="la la-cloud-upload ks-icon"></span>
                                                            <span class="ks-text">Choose file</span>
                                                            <input type="file" name="image" id="image"
                                                                   onchange="readURL(this);">
                                                        </button>

                                                        <img id="blah" src="http://placehold.it/750x450"
                                                             class="img-responsive img-thumbnail" alt="your image" style="max-height: 120px; margin-left: 10px"/>

                                                        @if ($errors->has('image'))
                                                            <div class="has-error">
                                                                <strong>* {{ $errors->first('image') }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="panel panel-default form-group @if ($errors->has('category_id')) has-danger @endif">
                                                <div class="card-header form-control-label">
                                                    Categories
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <select name="category_id[]" multiple
                                                                class="form-control form-control-danger select2"
                                                                style="width: 100%">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ ( in_array($category->id, old("category_id", [])) ? "selected":"") }}>{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @if ($errors->has('category_id'))
                                                        <div class="has-error">
                                                            <strong>* {{ $errors->first('category_id') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="panel panel-default form-group @if ($errors->has('user_id')) has-danger @endif">
                                                <div class="card-header form-control-label">
                                                    Author
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <select style="width: 100%" name="user_id"
                                                                class="form-control form-control-danger select2">
                                                            @foreach($users as $user)
                                                                <option value="{{ $user->id }}"
                                                                        @if($user->id == old('user_id', auth()->user()->id)) selected @endif>
                                                                    {{ $user->name }} : {{ $user->email }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('user_id'))
                                                            <div class="has-error">
                                                                <strong>* {{ $errors->first('user_id') }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default form-group">
                                                <div class="card-header">
                                                    Publication Status
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="status" value="0" type="radio"
                                                                   class="custom-control-input"
                                                                   @if(old('status', 0) == 0) checked @endif>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Pending</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="status" value="1" type="radio"
                                                                   class="custom-control-input"
                                                                   @if(old('status', 0) == 1) checked @endif>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Published</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <div class="panel panel-default form-group @if ($errors->has('description')) has-danger @endif ">
                                                <div class="card-header form-control-label">
                                                    Description
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <textarea name="description" id="description"
                                                                  class="form-control"
                                                                  title="">{{ old('description') }}</textarea>
                                                        @if ($errors->has('description'))
                                                            <div class="has-error">
                                                                <strong>* {{ $errors->first('description') }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                    </div>


                                    <div class="row">


                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="panel panel-default form-group @if ($errors->has('slug')) has-danger @endif ">
                                                <div class="card-header form-control-label">
                                                    Article URL
                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="badge badge-info">
                                                        Good Example of URL is: match-analysis-report-of-liverpool-vs-manchester-united
                                                    </span>
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <input type="text"
                                                               name="slug"
                                                               value="{{ old('slug') }}"
                                                               class="form-control"
                                                               placeholder="Enter URL">
                                                        @if ($errors->has('slug'))
                                                            <div class="has-error">
                                                                <strong>* {{ $errors->first('slug') }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="panel panel-default form-group @if ($errors->has('tags')) has-danger @endif ">
                                                <div class="card-header form-control-label">
                                                    Article Tags

                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="badge badge-info">
                                                        Good Example of Tags is: manager name, team name, players name, stadium name etc.
                                                    </span>
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <input type="text" name="tags" class="form-control"
                                                               id="tags" value="{{ old('tags') }}">
                                                        @if ($errors->has('tags'))
                                                            <div class="has-error">
                                                                <strong>* {{ $errors->first('tags') }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 col-sm-12 col-xs-12">

                                            <div class="panel panel-default form-group @if ($errors->has('meta_title')) has-danger @endif ">
                                                <div class="card-header form-control-label">
                                                    Meta Title
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <input name="meta_title" id="meta_title"
                                                               class="form-control"
                                                               value="{{ old('meta_title') }}">
                                                        @if ($errors->has('meta_title'))
                                                            <div class="has-error">
                                                                <strong>* {{ $errors->first('meta_title') }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="panel panel-default form-group ">
                                                <div class="card-header form-control-label">
                                                    Slider Status
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="featured_status" value="0"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                   @if(old('featured_status', 0) == 0) checked @endif>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="featured_status" value="1"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                   @if(old('featured_status', 0) == 1) checked @endif>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Yes</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12">

                                            <div class="panel panel-default form-group @if ($errors->has('meta_keyword')) has-danger @endif ">
                                                <div class="card-header form-control-label">
                                                    Meta Description

                                                    &nbsp;&nbsp;&nbsp;
                                                    <p class="badge badge-info">
                                                        Meta Description should match with article title, category,
                                                        description text
                                                    </p>
                                                </div>


                                                <div class="card-block">
                                                    <div class="form-group">
                                                            <textarea name="meta_keyword" id="meta_keyword"
                                                                      rows="9"
                                                                      class="form-control">{{ old('meta_keyword') }}</textarea>

                                                        @if ($errors->has('meta_keyword'))
                                                            <div class="has-error">
                                                                <strong>* {{ $errors->first('meta_keyword') }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Article</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('after_js')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets') }}/libs/summernote/summernote.css"> <!-- original -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets') }}/assets/styles/libs/summernote/summernote.min.css"> <!-- customization -->
    <script src="{{ asset('adminAssets') }}/libs/summernote/summernote.min.js"></script>
    <script src="{{ asset('adminAssets') }}/libs/bootstrap-tokenfield/bootstrap-tokenfield.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#description').summernote({
            height: 520,
            popover: {
                image: [],

            }
        });

        $('.select2').select2({});

        $('#tags').tokenfield();
    </script>


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