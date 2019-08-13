@extends('backend.index')

@section('after_css')
    <style>
        .category-button {
            margin-top: 5px;
        }
    </style>
@endsection

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4 id="form-validation-length">{{ $title }}</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <div class="ks-user-list-view-table">

                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <form action="{{ url()->current() }}" method="get">
                                                <div class="input-group">
                                                    <input type="text" name="string"
                                                           value="@if(isset($_GET['string'])) {{ $_GET['string'] }} @endif"
                                                           class="form-control"
                                                           placeholder="Search by Title">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button">Search!</button>
                                                </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="ks-full-table">
                                        <table id="ks-datatable" class="table ks-table-info dt-responsive nowrap"
                                               width="100%" data-pagination="true">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th width="10%">Last Edited By</th>
                                                <th width="14%">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($articles as $article)
                                                <tr>
                                                    <td>
                                                        <img src="@if(isset($article->image)) {{ asset('image_upload/post_image/thumbs/'.$article->image) }} @endif"
                                                             class="ks-avatar" alt="" width="80" height="80">
                                                    </td>
                                                    <td>
                                                        @if($article->status == 1)

                                                            <a href="{{ route('article.details',['id'=>$article->id,'slug'=>$article->slug]) }}" target="_blank">
                                                                {{ $article->title }}
                                                            </a>
                                                        @else
                                                            {{ $article->title }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php $categories = explode(',',$article->category_id) @endphp
                                                        @foreach($categories as $category)
                                                            <div class="btn btn-info btn-sm category-button">
                                                                {{ $article->category($category) }}
                                                            </div>
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-info">{{ $article->author->name }}</div>
                                                    </td>
                                                    <td>
                                                        {{ $article->created_at->format('d F Y h:i A') }}
                                                    </td>
                                                    <td>
                                                        @if($article->status == 1)
                                                            <span class="badge badge-success">Published</span>

                                                        @else
                                                            <span class="badge badge-danger">Pending</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($article->admin_id != '')
                                                            <div class="badge badge-danger">{{ $article->admin->name }}</div>
                                                        @else
                                                            Empty
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="pull-left">
                                                            <a href="{{ route('edit.article', ['id'=>$article->id]) }}"
                                                               class="btn btn-info btn-sm"
                                                            ><i
                                                                        class="la la-pencil-square-o"></i>Edit
                                                            </a>
                                                        </div>

                                                        <div class="pull-right">
                                                            <a href="{{ route('delete.article', ['id'=>$article->id]) }}"
                                                               onclick="return confirm('Are you sure about to delete this article?')"
                                                               class="btn btn-danger btn-sm"><i
                                                                        class="la la-trash-o"></i> Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                        <nav>
                                            @if(count($articles) > 0)

                                                <div class="alert alert-info">
                                                    Showing {{ $articles->firstItem() }}
                                                    to {{ $articles->lastItem() }}
                                                    Article of
                                                    Total {{ $articles->total() }} Articles.
                                                </div>

                                                <nav aria-label="Page navigation">
                                                    @if ($articles->lastPage() > 1)
                                                        <ul class="pagination pagination-sm">
                                                            <li class="page-item {{ ($articles->currentPage() == 1) ? ' disabled' : '' }}">
                                                                <a class="page-link" href="{{ $articles->url(1) }}">Previous</a>
                                                            </li>
                                                            @for ($i = 1; $i <= 20; $i++)
                                                                <li class="page-item {{ ($articles->currentPage() == $i) ? 'page active' : '' }}">
                                                                    <a class="page-link"
                                                                       href="{{ $articles->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                            @endfor
                                                            <li class="page-item {{ ($articles->currentPage() == $articles->lastPage()) ? ' disabled' : '' }}">
                                                                <a class="page-link"
                                                                   href="{{ $articles->url($articles->currentPage()+1) }}">Next</a>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </nav>
                                            @else
                                                <div class="alert alert-danger">
                                                    No Result Found!
                                                </div>
                                            @endif

                                        </nav>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('after_js')

@endsection