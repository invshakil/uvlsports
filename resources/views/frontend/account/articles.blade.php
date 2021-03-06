@extends('frontend.index')


@section('title') {{ $title }} @endsection

@section('after_style')
    <link href="{{ asset('frontend/css/account.css') }}" rel="stylesheet">

    <style>
        .article-submit {
            padding: 20px 5px 20px 5px;
        }

        .table > tbody > tr > td > a {
            margin-bottom: 5px;
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
                                        class="fa fa-plus"></i> নতুন লেখা সাবমিট করুন</a>
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
                                    @if(url()->current() != route('favorite.articles'))
                                    <th> Option</th>
                                    @endif
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
                                                       href="#">{{ $article->category($category)->bangla_name }}</a>
                                                @endforeach
                                            </td>
                                            <td>{{ $article->title }}
                                            </td>
                                            <td>
                                                <a href="{{ route('article.details', ['id'=>$article->id,'slug'=>$article->slug]) }}" class="btn btn-success"> পড়ুন</a>
                                            </td>
                                            @if(url()->current() != route('favorite.articles'))
                                            <td>
                                                @if($article->status == 0)
                                                <a href="{{ route('account.article.edit', ['id'=>$article->id]) }}" class="btn btn-warning">আপডেট করুন</a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn btn-success">Published</a>
                                                @endif
                                            </td>
                                            @endif
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
