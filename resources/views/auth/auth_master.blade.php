<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">


    <style>
        .has-error .control-label {
            color: red !important;
        }

        .has-error .form-control {
            border-color: red;
            color: red;
        }

        .help-block {
            color: red !important;
        }

        .has-success .control-label {
            color: #01a252;
        }

        .has-success .form-control {
            border-color: #01a252 !important;
        }

        /*
            Note: It is best to use a less version of this file ( see http://css2less.cc
            For the media queries use

        @screen-sm-min

        instead of 768px.
                For .omb_spanOr use

        @body-bg
 instead of white. */

        body {
            background-image: url("{{ url('auth_background.jpg') }}");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
        }

        @media (min-width: 768px) {
            .omb_row-sm-offset-3 div:first-child[class*="col-"] {
                margin-left: 25%;
            }
        }

        .omb_login .omb_authTitle {
            margin-top: 100px;
            text-align: center;
            line-height: 300%;
        }

        .omb_login .omb_socialButtons a {
            color: white;
        / / In yourUse @body-bg
	              opacity: 0.9;
        }

        .omb_login .omb_socialButtons a:hover {
            color: white;
            opacity: 1;
        }

        .omb_login .omb_socialButtons .omb_btn-facebook {
            background: #3b5998;
        }

        .omb_login .omb_socialButtons .omb_btn-twitter {
            background: #00aced;
        }

        .omb_login .omb_socialButtons .omb_btn-google {
            background: #c32f10;
        }

        .omb_login .omb_loginOr {
            position: relative;
            font-size: 1.5em;
            color: #aaa;
            margin-top: 1em;
            margin-bottom: 1em;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
        }

        .omb_login .omb_loginOr .omb_hrOr {
            background-color: #cdcdcd;
            height: 1px;
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .omb_login .omb_loginOr .omb_spanOr {
            display: block;
            position: absolute;
            left: 50%;
            top: -0.6em;
            margin-left: -1.5em;
            background-color: white;
            width: 3em;
            text-align: center;
        }

        .omb_login .omb_loginForm .input-group.i {
            width: 2em;
        }

        .omb_login .omb_loginForm .help-block {
            color: red;
        }

        @media (min-width: 768px) {
            .omb_login .omb_forgotPwd {
                text-align: right;
                margin-top: 10px;
                color: white;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default" style="background: transparent;border-color: transparent">
        <div class="container-fluid" style="text-align: center; ">
            <!-- Brand and toggle get grouped for better mobile display -->

                <a class="btn btn-success" href="{{ url('/') }}">Go Back to Website</a>

        </div><!-- /.container-fluid -->
    </nav>

    @yield('body')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

    @yield('js')
</div>
</body>
</html>