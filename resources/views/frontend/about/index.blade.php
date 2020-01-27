@extends('frontend.index')


@section('title') {{ $title }} @endsection
@section('image') {{ $image }} @endsection
@section('description') {{ $description }} @endsection
@section('keyword') {{ $keyword }} @endsection
@section('author') {{ $author }} @endsection


@section('after_style')
    <style>
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            border: none;
        }

        .about-us-content a {
            color: #cc4751;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="page-breadcrumbs">
            <h1 class="section-title title">আমাদের সম্পর্কে</h1>
        </div>
        <div class="about-us welcome-section">
            <div class="row">
                <div class="col-md-12 col-sm-12 content-section">
                    <div class="about-us-content">
                        {!! \App\Widget::getWidget('about_us') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="our-team">
            <h1 class="section-title title">ইউভিএল স্পোর্টস টিম</h1>
            <div class="team-members">
                <div class="row">
                    @foreach($admins as $admin)
                        <div class="col-sm-3" style="min-height: 260px">
                            <div class="single-member">
                                <div class="member-image">
                                    <div class="overlay">
                                        <ul class="list-inline social-icons">
                                            @if($admin->user_fb)
                                                <li><a href="{{ $admin->user_fb }}" target="_blank"><i
                                                                class="fa fa-facebook"></i></a></li>
                                            @endif
                                            @if($admin->twitter)
                                                <li><a href="{{ $admin->twitter }}" target="_blank"><i
                                                                class="fa fa-twitter"></i></a></li>
                                            @endif
                                            @if($admin->email)
                                                <li><a href="mailto:{{ $admin->email }}" target="_blank"><i
                                                                class="fa fa-envelope"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <img class="img-responsive" src="{{ $admin->user_avatar }}" alt=""
                                         style="height: 200px; width: auto; margin: 0 auto"/>
                                </div>
                                <h3>{{ $admin->name }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after_script')

@endsection