@extends('frontend.index')


@section('title') {{ $title }} @endsection

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

                        <h2 class="title-2">
                            @if(request()->url() == route('my.articles'))
                                <i class=" fa fa-get-pocket"></i>
                            @elseif(request()->url() == route('favorite.articles'))
                                <i class=" fa fa-heart"></i>
                            @elseif(request()->url() == route('pending.articles'))
                                <i class=" fa fa-eject"></i>
                            @else
                                <i class=" fa fa-download"></i>
                            @endif
                            {{ $title }}
                        </h2>
                        <div>
                            <a href="{{ route('create.article') }}"
                               class="btn btn-default"><i
                                        class="fa fa-plus"></i> Create new Article</a>
                        </div>
                        <br>


                        @if(Session::has('message'))
                            <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('message') !!}</em></div>
                        @endif


                        <div class="table-responsive">

                            <table class="table table-bordered table">
                                <thead>
                                <tr>
                                    <th data-type="numeric" data-sort-initial="true">#</th>
                                    <th data-sort-ignore="true"> Category</th>
                                    <th> Title</th>
                                    <th data-type="numeric">Visit</th>
                                    <th> Option</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($articles) > 0)
                                    @foreach($articles as $key=>$article)
                                        @php $categories = explode(',',$article->category_id); @endphp

                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                @foreach($categories as $category)
                                                    <a class="btn btn-info"
                                                       href="#">{{ $article->category($category) }}</a>
                                                @endforeach
                                            </td>
                                            <td>{{ $article->title }}
                                            </td>
                                            <td>
                                                <a href="{{ route('article.details', ['id'=>$article->id,'slug'=>$article->slug]) }}" class="btn btn-success">Go to Article</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('account.article.edit', ['id'=>$article->id]) }}" class="btn btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-success">
                                                You have no {{ $title }}!
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>

                            {{ $articles->links() }}
                        </div>

                    </div>
                </div><!--/.section-->
            </div>
        </div>
    </div>

@endsection

@section('after_script')

@endsection
