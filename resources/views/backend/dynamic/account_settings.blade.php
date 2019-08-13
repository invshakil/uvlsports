@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 id="form-validation-basic-demo">Account Settings </h4>
                        <div class="card panel">
                            <div class="card-block">
                                <form>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text"
                                               value="{{ auth()->user()->name }}"
                                               name="name"
                                               class="form-control"
                                               placeholder="Enter Your Name"
                                               data-validation="length alphanumeric"
                                               data-validation-length="6-30"
                                               data-validation-error-msg="System name has to be an alphanumeric value (6-30 chars)">
                                    </div>

                                    <div class="form-group">
                                        <label>User E-mail</label>
                                        <input type="text" name="email" class="form-control"
                                               value="{{ auth()->user()->email }}"
                                               aria-describedby="emailHelp" placeholder="Enter email"
                                               data-validation="email">
                                        <small class="form-text text-muted">We'll never share your email with anyone
                                            else.
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <label>User Address</label>
                                        <textarea type="text" name="address" class="form-control"
                                                  value="{{ auth()->user()->address }}"
                                                  placeholder="Company Address"
                                                  data-validation="length alphanumeric"
                                                  data-validation-length="6-30"
                                                  data-validation-error-msg="Company Address has to be an alphanumeric value (6-150 chars)">

                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>User Contact Number</label>
                                        <input type="text"
                                               name="phone"
                                               value="{{ auth()->user()->phone }}"
                                               class="form-control"
                                               placeholder="Enter Phone Number"
                                               data-validation="length alphanumeric"
                                               data-validation-length="6-30"
                                               data-validation-error-msg="Phone Number has to be an alphanumeric value (6-30 chars)">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Account Information</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <h4 id="form-validation-length">Profile Picture</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <form>
                                    <div class="form-group">
                                        <label>Upload User Profile Picture</label>
                                        <button class="btn btn-primary ks-btn-file">
                                            <span class="la la-cloud-upload ks-icon"></span>
                                            <span class="ks-text">Choose file</span>
                                            <input type="file" name="image" onchange="readURL(this);"
                                                   data-validation="mime size required"
                                                   data-validation-allowing="jpg, png"
                                                   data-validation-max-size="300kb"
                                                   data-validation-error-msg-required="No image selected">
                                        </button>
                                        <br>
                                        <br>
                                        <img id="blah" src="http://placehold.it/600x500" width="300"
                                             class="img-responsive img-thumbnail" alt="your image"/>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Logo</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h4 id="form-validation-basic-demo">Change Password</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <form>

                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password"
                                               class="form-control"
                                               placeholder="Enter Password"
                                               data-validation="strength"
                                               data-validation-strength="2">
                                    </div>

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="password"
                                               class="form-control"
                                               placeholder="Enter Password"
                                               data-validation="strength"
                                               data-validation-strength="2">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="conf_password"
                                               class="form-control"
                                               placeholder="Confirm Password"
                                               data-validation="confirmation">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save New Password</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="ks-user-list-view-grid">
                            <h4 id="form-validation-basic-demo">Current Account Information</h4>
                            <div class="card ks-crm-grid-view-user-card">
                                <div class="card-block">
                                    <img src="{{ asset('admin/') }}/assets/img/avatars/avatar-1.jpg" alt=""
                                         class="ks-avatar"
                                         width="90" height="90">
                                    &nbsp;
                                    &nbsp;
                                    <span class="ks-crm-grid-view-user-card-name">{{ auth()->user()->name }}</span>

                                    <br><br>
                                    <div class="ks-crm-grid-view-user-card-info">
                                        <div class="ks-crm-grid-view-user-card-info-created-by">
                                            <span class="ks-icon la la-envelope"></span>
                                            Email: {{ auth()->user()->email }}
                                        </div>
                                        <div class="ks-crm-grid-view-user-card-info-created-by">
                                            <span class="ks-icon la la-phone"></span> Phone: {{ auth()->user()->phone }}
                                        </div>
                                        <div class="ks-crm-grid-view-user-card-info-created-by">
                                            <span class="ks-icon la la-barcode"></span>
                                            Address: {{ auth()->user()->address }}
                                        </div>
                                        <div class="ks-crm-grid-view-user-card-info-created-by">
                                            <span class="ks-icon la la-envelope"></span> User
                                            Role:
                                            @if(auth()->user()->role == 1)
                                                <span class="badge badge-danger">Admin</span>
                                            @elseif(auth()->user()->role == 2)
                                                <span class="badge badge-pink">Moderator</span>
                                            @else
                                                <span class="badge badge-primary">Customer</span>
                                            @endif
                                        </div>
                                        <div class="ks-crm-grid-view-user-card-info-created-by">
                                            <span class="ks-icon la la-calendar-check-o"></span>
                                            Last Updated On: {{ auth()->user()->updated_at->format('d-M-Y h:i A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .ks-crm-grid-view-user-card-info-created-by {
            padding: 7px;
        }
    </style>

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