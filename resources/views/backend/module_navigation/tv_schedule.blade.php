@extends('backend.index')

@section('module_navigation')


    <div class="ks-navbar-horizontal ks-info">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link @if(Request::url() == route('create.matches.info')) active @endif"
                   href="{{ route('create.matches.info') }}">Create Matches Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Request::url() == route('create.game.week')) active @endif"
                   href="{{ route('create.game.week') }}">Create Game Week</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Request::url() == route('create.tournament')) active @endif"
                   href="{{ route('create.tournament') }}">Create Tournaments</a>
            </li>


        </ul>
    </div>


@endsection