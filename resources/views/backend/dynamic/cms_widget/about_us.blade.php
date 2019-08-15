@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card panel">
                            <div class="card-block">
                                <h4 id="form-validation-length">About Us Description</h4>
                                <form method="post" action="{{ url()->current() }}">
                                    {{ csrf_field() }}
                                    <div class="form-group @if ($errors->has('about_us')) has-danger @endif">
                                        <div class="form-group">
                                            <label for="aboutUs">Content</label>
                                            <textarea name="about_us" id="aboutUs"
                                                      class="form-control"
                                                      title="">{{ old('about_us', \App\Widget::getWidget('about_us')) }}</textarea>
                                            @if ($errors->has('about_us'))
                                                <div class="has-error">
                                                    <strong>* {{ $errors->first('about_us') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
    <script>
        $('#aboutUs').summernote({
            height: 520,
            popover: {
                image: [],

            }
        });

    </script>

@endsection