@extends('backend.index')

@section('module_navigation')


    <div class="ks-navbar-horizontal ks-info">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link @if(Request::url() == route('user.add')) active @endif" href="{{ route('user.add') }}">Add User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Request::url() == route('user.manage')) active @endif" href="{{ route('user.manage') }}">Manage User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Request::url() == route('user.role')) active @endif" href="{{ route('user.role') }}">User Permissions</a>
            </li>


        </ul>
    </div>


@endsection