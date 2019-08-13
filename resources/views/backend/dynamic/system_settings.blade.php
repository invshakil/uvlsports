@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h4 id="form-validation-basic-demo">Set Up System Information</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <form action="{{ url()->current() }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>System Name</label>
                                        <input type="text"
                                               name="name"
                                               value="{{ $system_name }}"
                                               class="form-control"
                                               placeholder="Enter System Name"
                                               data-validation="required"
                                               data-validation-length="6-30"
                                               data-validation-error-msg="System name has to be an alphanumeric value (6-30 chars)">
                                    </div>

                                    <div class="form-group">
                                        <label>System E-mail</label>
                                        <input type="text" name="email" value="{{ $system_email }}" class="form-control"
                                               aria-describedby="emailHelp" placeholder="Enter email"
                                               data-validation="email">
                                        <small class="form-text text-muted">We'll never share your email with anyone
                                            else.
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <label>Company Address</label>
                                        <textarea type="text" name="address" class="form-control"
                                                  placeholder="Company Address"
                                                  data-validation="required"
                                                  data-validation-length="6-30"
                                                  data-validation-error-msg="Company Address has to be an alphanumeric value (6-150 chars)">{{ $address }}

                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text"
                                               name="phone"
                                               value="{{ $phone }}"
                                               class="form-control"
                                               placeholder="Enter Phone Number"
                                               data-validation="required"
                                               data-validation-length="6-30"
                                               data-validation-error-msg="Phone Number has to be an alphanumeric value (6-30 chars)">
                                    </div>


                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text"
                                               name="facebook"
                                               value="{{ $facebook }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Twitter Link</label>
                                        <input type="text"
                                               name="twitter"
                                               value="{{ $twitter }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Google Plus Link</label>
                                        <input type="text"
                                               name="google"
                                               value="{{ $google }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Youtube Link</label>
                                        <input type="text"
                                               name="youtube"
                                               value="{{ $youtube }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Linkedin Link</label>
                                        <input type="text"
                                               name="linkedin"
                                               value="{{ $linkedin }}"
                                               class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save System Information</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h4 id="form-validation-length">System Logo</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <form action="{{ route('save.logo') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>System Logo</label>
                                        <button class="btn btn-primary ks-btn-file">
                                            <span class="la la-cloud-upload ks-icon"></span>
                                            <span class="ks-text">Choose file</span>
                                            <input type="file" name="logo" onchange="readURL(this);"
                                                   data-validation="mime size required"
                                                   data-validation-allowing="jpg, png"
                                                   data-validation-max-size="2000kb"
                                                   data-validation-error-msg-required="No image selected">
                                        </button>
                                        <br>
                                        <br>
                                        <img id="blah" src="@if(isset($logo)) {{ asset($logo) }} @else http://placehold.it/300x90 @endif"
                                             class="img-responsive img-thumbnail" alt="your image"/>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Logo</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <h4 id="form-validation-length">Mail Set Up</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <form action="{{ route('save.mail.config') }}" method="post" >
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Official Email</label>
                                        <input type="text"
                                               name="official_email"
                                               value="{{ $official_email }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Email's Password</label>
                                        <input type="password"
                                               name="password"
                                               value="{{ $password }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Host</label>
                                        <input type="text"
                                               name="host"
                                               value="{{ $host }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Port</label>
                                        <input type="text"
                                               name="port"
                                               value="{{ $port }}"
                                               class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Configuration</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection