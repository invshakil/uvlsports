@extends('backend.index')

@section('after_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin') }}/libs/bootstrap-tokenfield/css/bootstrap-tokenfield.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin') }}/assets/styles/libs/bootstrap-tokenfield/bootstrap-tokenfield.min.css">

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
                                            <div class="panel panel-default color-blue">
                                                <div class="card-header">
                                                    Article Title
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <input type="text"
                                                               name="title"
                                                               value=""
                                                               class="form-control"
                                                               placeholder="Enter Title"
                                                               data-validation="required"
                                                               data-validation-length="6-250"
                                                               data-validation-error-msg="Title has to be a minimum (6-250 chars) value ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="panel panel-default color-purple">
                                                <div class="card-header">
                                                    Article Image
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary ks-btn-file">
                                                            <span class="la la-cloud-upload ks-icon"></span>
                                                            <span class="ks-text">Choose file</span>
                                                            <input type="file" name="image" id="image"
                                                                   onchange="readURL(this);"
                                                                   data-validation="mime size"
                                                                   data-validation-allowing="jpg, png"
                                                                   data-validation-max-size="2000kb"
                                                                   data-validation-error-msg-required="No image selected">
                                                        </button>
                                                        <br>
                                                        <br>
                                                        <img id="blah" src="http://placehold.it/620x348"
                                                             class="img-responsive img-thumbnail" alt="your image"/>
                                                    </div>
                                                </div>
                                            </div>


                                            <br>

                                            <div class="panel panel-default color-cyan">
                                                <div class="card-header">
                                                    Categories
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <select name="category_id[]" multiple
                                                                class="form-control select2" style="width: 100%">
                                                            @foreach($categories as $category)

                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="panel panel-default color-cyan">
                                                <div class="card-header">
                                                    Author
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <select style="width: 100%" name="user_id"
                                                                class="form-control select2">
                                                            @foreach($users as $user)

                                                                <option value="{{ $user->id }}"
                                                                        @if($user->id == auth()->user()->id) selected @endif>
                                                                    {{ $user->name }} : {{ $user->email }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <div class="panel panel-default color-blue">
                                                <div class="card-header">
                                                    Description
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <textarea name="description" id="description"
                                                                  class="form-control"
                                                                  title=""
                                                                  data-validation="required"
                                                                  data-validation-length="200-6000"
                                                                  data-validation-error-msg="Description has to be an alphanumeric value (200-6000 chars)"></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                    </div>


                                    <div class="row">


                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="panel panel-default color-blue">
                                                <div class="card-header">
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
                                                               value=""
                                                               class="form-control"
                                                               placeholder="Enter URL"
                                                               data-validation="required"
                                                               data-validation-length="6-50"
                                                               data-validation-error-msg="URL slug should have minimum (6-50 chars) value ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="panel panel-default color-blue">
                                                <div class="card-header">
                                                    Article Tags

                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="badge badge-info">
                                                        Good Example of Tags is: manager name, team name, players name, stadium name etc.
                                                    </span>
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <input type="text" name="tags" class="form-control"
                                                               id="tags" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 col-sm-12 col-xs-12">

                                            <div class="panel panel-default color-blue">
                                                <div class="card-header">
                                                    Meta Title
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <input name="meta_title" id="meta_title"
                                                               class="form-control"
                                                               title=""
                                                               data-validation="required"
                                                               data-validation-length="6-250"
                                                               data-validation-error-msg="Meta Title should have minimum (6-250 chars) value ">
                                                    </div>
                                                </div>
                                            </div>

                                            <br>


                                            <div class="panel panel-default color-blue">
                                                <div class="card-header">
                                                    Publication Status
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="status" value="0" type="radio"
                                                                   class="custom-control-input" checked>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Pending</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="status" value="1" type="radio"
                                                                   class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Published</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12">

                                            <div class="panel panel-default color-blue">
                                                <div class="card-header">
                                                    Meta Keyword

                                                    &nbsp;&nbsp;&nbsp;
                                                    <p class="badge badge-info">
                                                        Meta keyword should match with article title, category,
                                                        description text
                                                    </p>
                                                </div>


                                                <div class="card-block">
                                                    <div class="form-group">
                                                            <textarea name="meta_keyword" id="meta_keyword"
                                                               class="form-control"
                                                               title=""
                                                               data-validation="required"
                                                               data-validation-length="6-450"
                                                                  data-validation-error-msg="Meta Keyword should have minimum (6-450 chars) value "></textarea>


                                                    </div>
                                                </div>
                                            </div>


                                            <br>


                                            <div class="panel panel-default color-blue">
                                                <div class="card-header">
                                                    Slider Status
                                                </div>
                                                <div class="card-block">
                                                    <div class="form-group">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="featured_status" value="0"
                                                                   type="radio"
                                                                   class="custom-control-input" checked>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="featured_status" value="1"
                                                                   type="radio"
                                                                   class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Yes</span>
                                                        </label>
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

    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="{{ asset('admin') }}/libs/bootstrap-tokenfield/bootstrap-tokenfield.min.js"></script>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.config.height = '515px';
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

        $('#image').change(function () {

            var fr = new FileReader;

            fr.onload = function () {
                var img = new Image;

                img.onload = function () {
                    var widthImage = 16 / 9;

                    var width = img.naturalWidth;
                    var height = img.naturalHeight;

                    var UploadedImageRatio = width / height;
                    
                    console.log(UploadedImageRatio);

                    if ( (UploadedImageRatio < 2) && (UploadedImageRatio > 1.6) ) {

                        toastr.success('16:9 Aspect Ratio Matched!', 'Successful!');

                    } else {
                        //user using different screen resolution
                        alert('Please select an image which has 16:9 (width screen) aspect ratio');
                        $('#image').val('');
                        $('#blah')
                            .attr('src', 'http://placehold.it/620x348');
                    }
                };

                img.src = fr.result;
            };

            fr.readAsDataURL(this.files[0]);

        });

    </script>
@endsection