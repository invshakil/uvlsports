@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h4 id="form-validation-basic-demo">Fill up the Mail Setup required Data</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <form>
                                    <div class="form-group">
                                        <label>System Default E-mail For Mailing</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp"
                                               placeholder="Enter email" data-validation="email">
                                        <small class="form-text text-muted">We'll use this email to send default mail to
                                            customers.
                                        </small>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Password</label>
                                        <input type="password"
                                               class="form-control"
                                               placeholder="Enter Password"
                                               data-validation="strength"
                                               data-validation-strength="2">
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Protocol</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Enter Protocol SMTP/Sendmail"
                                               data-validation="length alphanumeric"
                                               data-validation-length="3-12"
                                               data-validation-error-msg="Mail Protocol has to be an alphanumeric value (3-12 chars)">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection