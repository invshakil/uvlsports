@extends('backend.index')

@section('module_navigation')


    <div class="ks-navbar-horizontal ks-info">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link @if(Request::url() == route('admin.article.list')) active @endif"
                   href="{{ route('admin.article.list') }}">Manage Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Request::url() == route('admin.pending.article.list')) active @endif"
                   href="{{ route('admin.pending.article.list') }}">Pending Articles</a>
            </li>


        </ul>
    </div>


@endsection