@extends('backend.index')

@section('after_css')
    <style>
        .alert-danger{
            background: #da1b18;
            border: #da1b18;
            color: #ffffff;
        }
    </style>
@endsection

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h4 id="form-validation-basic-demo">Fill up the Users Required Data</h4>

                        <form action="{{ route('save.user') }}" method="post">
                            <div class="card panel">
                                <div class="card-block">

                                    @if ($errors->any())
                                        <div class="alert alert-danger"> {{ implode('', $errors->all(':message')) }}</div>
                                    @endif

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               placeholder="Enter Name"
                                               data-validation="required"
                                               data-validation-length="3-50"
                                               data-validation-error-msg="Name has to be within (3-20 chars)">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Enter email" data-validation="email">

                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text"
                                               name="address"
                                               class="form-control"
                                               placeholder="Enter Address">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text"
                                               name="phone"
                                               class="form-control"
                                               placeholder="Enter Phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password"
                                               name="password"
                                               class="form-control"
                                               placeholder="Enter Password"
                                               data-validation="strength"
                                               data-validation-strength="1">
                                    </div>
                                    <div class="form-group">
                                        <label>User Role</label>
                                        <select name="role" class="form-control" id="">
                                            <option value="1">Admin</option>
                                            <option value="2">Moderator</option>
                                            <option value="3">User</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="la la-check ks-icon"></span>
                                            <span class="ks-text">Add User</span>
                                        </button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after_js')

@endsection