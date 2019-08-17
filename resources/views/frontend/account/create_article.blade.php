@extends('frontend.index')

@section('title')
    {{ $title }}
@endsection

@section('after_style')
    <link href="{{ asset('frontend/css/account.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <style>
        .article-submit {
            padding: 20px 5px 20px 5px;
        }
        @media only screen and (min-width: 900px) {
            .inner-body, .inner-box {
                min-height: 900px;
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
                        <h2 class="title-2"><i class=" fa fa-edit"></i> Create New Article </h2>

                        @if(Session::has('message'))
                            <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('message') !!}</em></div>
                        @endif

                        <div class="article-submit">

                            <form action="{{ url()->current() }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group ">
                                    <label for="title">Title*</label>
                                    <input type="text" name="title"
                                           id="title"
                                           class="form-control @if ($errors->has('title')) has-error @endif"
                                           value="{{ old('title') }}">

                                    @if ($errors->has('title'))
                                        <div class="errors">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>

                                <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                                    <label for="category_id">Select Category*</label>

                                    <select name="category_id[]" multiple id="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( in_array($category->id, old("category_id", [])) ? "selected":"") }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('category_id'))
                                        <div class="errors">{{ $errors->first('category_id') }}</div>
                                    @endif
                                </div>

                                <div class="form-group" style="background-color: #ccc; color: #0b0b0b; padding: 10px">
                                    <p>১। বাংলিশ লেখার চেয়ে বাংলা শব্দচয়নে আর্টিক্যাল লেখার চেষ্টা করবেন। ইংরেজি শব্দের মাত্রাতিরিক্ত ব্যবহার হলে আর্টিক্যাল এপ্রুভ না হতে পারে।</p>
                                    <p>২। শব্দের মাঝে ডাবল স্পেস ব্যবহার থেকে বিরত থাকবেন। </p>
                                    <p>৩। যেকোন ধরনের বিরতি চিহ্নের আগে স্পেস দিবেন না, তবে বিরতি চিহ্নের পর স্পেস হবে। </p>

                                </div>

                                <div class="form-group @if ($errors->has('description')) has-error @endif">
                                    <label for="description">Description*</label>
                                    <textarea title="" name="description" id="description" class="form-control"
                                              required="required">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <div class="errors">{{ $errors->first('description') }}</div>
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
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets') }}/libs/summernote/summernote.css"> <!-- original -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets') }}/assets/styles/libs/summernote/summernote.min.css"> <!-- customization -->
    <script src="{{ asset('adminAssets') }}/libs/summernote/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script>
        $('#description').summernote({
            height: 400,
            popover: {
                image: [],

            }
        });
        $('#category_id').select2({});
    </script>
@endsection