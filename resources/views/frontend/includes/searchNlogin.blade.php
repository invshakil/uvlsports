<style>
    .signin-icon{
        padding: 8px 12px;
        font-size: 16px;
        font-weight: bolder;
        background: #ffffff;
        color: #456098;
        border-radius: 5px;
    }
</style>
<div class="searchNlogin">
    <ul>
        <li class="search-icon"><i class="fa fa-search"></i></li>

        @if(! auth()->check())
            <li class="dropdown user-panel">
                <a href="javascript:void(0);" class="dropdown-toggle"
                   data-toggle="dropdown"><i class="fa fa-user"></i> Sign In</a>
                <div class="dropdown-menu top-user-section" id="modal-login">
                    <div class="top-user-form">
                        <form method="post" action="{{  route('login') }}" role="form">

                            {{csrf_field()}}
                            <div class="input-group" id="top-login-username">
                                <span class="input-group-addon"><img
                                            src="{{ asset('frontend') }}/images/others/user-icon.png" alt=""/></span>
                                <input type="text" name="email" class="form-control" placeholder="Username" required="">
                            </div>
                            <div class="input-group" id="top-login-password">
                                <span class="input-group-addon"><img
                                            src="{{ asset('frontend') }}/images/others/password-icon.png"
                                            alt=""/></span>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       required="">
                            </div>


                            <div class="input-group" id="top-login-password">
                                <label style="color: #fff">Remember Me</label>
                                &nbsp;
                                <input title="" type="checkbox" name="remember">
                            </div>

                            <div>
                                <p class="reset-user"><a href="{{ url('password/reset')  }}">Forgot
                                        Password/Username?</a></p>
                                <button class="btn btn-danger" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="create-account" style="background: #2c3e50; max-height: 80px">

                        <div class="input-group" id="top-login-password">
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="color: #fff; text-align: left;">Or Use Social Links for login</p>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{url('/login/facebook/redirect')}}">
                                        <i class="fa fa-facebook signin-icon"></i>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ url('/login/twitter/redirect') }}">
                                        <i class="fa fa-twitter signin-icon"></i>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ url('/login/google/redirect') }}">
                                        <i class="fa fa-google signin-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-account">
                        <a href="{{ route('register') }}">Create a New Account</a>
                    </div>
                </div>
            </li>
        @else

            <li class="dropdown user-panel">
                <a href="javascript:void(0);" class="dropdown-toggle"
                   data-toggle="dropdown"><i class="fa fa-user"></i> My Account</a>
                <div class="dropdown-menu top-user-section logged-in-dropdown">

                    <div class="col-md-12">
                        <a href="{{ route('account') }}"><i class="fa fa-home"></i> Account</a>
                    </div>

                    <div class="col-md-12">

                        <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>
            </li>


        @endif
    </ul>

    <div class="search">
        <form role="form">
            <input type="text" class="search-form" autocomplete="off" placeholder="Type & Press Enter">
        </form>
    </div> <!--/.search-->
</div>


<div class="row">
    <div class="col-md-12">

        @if(Session::has('message'))
            <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('message') !!}</em></div>
        @endif

        @if ($errors->has('email'))
            <div class="alert alert-danger fade in alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif

        @if ($errors->has('password'))
            <div class="alert alert-danger fade in alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif

    </div>

</div>

<style>

    .logged-in-dropdown div {
        padding: 15px;
        border: 1px solid white;
        text-align: center;
        font-weight: 600;
        font-size: 16px;
    }

    .dropdown-menu.top-user-section .logged-in-dropdown {
        min-width: 50px;
    }
</style>