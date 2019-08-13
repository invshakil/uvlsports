@extends('auth.auth_master')

@section('body')

    <div class="omb_login">
        <h3 class="omb_authTitle col-md-6 col-md-offset-3" style="background: rgba(0, 0, 0, 0.55); font-weight: bold; color: white">
            Already User?
            <a style="color: #00a6fc" href="{{ route('login') }}">Please Login</a></h3>

        <div class="row omb_row-sm-offset-3 omb_socialButtons">
            <div class="col-sm-2 col-xs-12">
                <a href="{{url('/login/facebook/redirect')}}" class="btn btn-lg btn-block omb_btn-facebook">
                    <i class="fa fa-facebook visible-xs"></i>
                    <span>Facebook</span>
                </a>
            </div>
            <div class="col-sm-2 col-xs-12">
                <a href="{{ url('/login/twitter/redirect') }}" class="btn btn-lg btn-block omb_btn-twitter">
                    <i class="fa fa-twitter visible-xs"></i>
                    <span>Twitter</span>
                </a>
            </div>
            <div class="col-sm-2 col-xs-12">
                <a href="{{ url('/login/google/redirect') }}" class="btn btn-lg btn-block omb_btn-google">
                    <i class="fa fa-google-plus visible-xs"></i>
                    <span>Google+</span>
                </a>
            </div>
        </div>

        <div class="row omb_row-sm-offset-3 omb_loginOr">
            <div class="col-xs-12 col-sm-6">
                <hr class="omb_hrOr">
                <span class="omb_spanOr">or</span>
            </div>
        </div>


        <div class="col-xs-12 col-sm-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="register" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary submit">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection


@section('js')
    <script>
        // Wait for the DOM to be ready
        $(function () {
            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='register']").validate({
                errorElement: "span",
                errorClass: "help-block",
                highlight: function (element, errorClass, validClass) {
                    // Only validation controls
                    if (!$(element).hasClass('novalidation')) {
                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    }
                },
                unhighlight: function (element, errorClass, validClass) {
                    // Only validation controls
                    if (!$(element).hasClass('novalidation')) {
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                    }
                },
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    }
                    else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
                        error.insertAfter(element.parent().parent());
                    }
                    else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                        error.appendTo(element.parent().parent());
                    }
                    else {
                        error.insertAfter(element);
                    }
                },

                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    name: "required",
                    email: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: '#password'
                    },
                },
                // Specify validation error messages
                messages: {
                    name: "Please enter your Full Name",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    email: "Please enter a valid email address",
                    password_confirmation: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 6 characters long',
                        equalTo: 'Please enter the same password as above'
                    }
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function (form) {
                    $(" .submit").attr("disabled", true);
                    form.submit();
                }
            });
        });
    </script>
@endsection