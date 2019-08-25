@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h4 id="form-validation-basic-demo">Fill up the Mail Setup required Data</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <div class="ks-user-list-view-table">

                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <form action="{{ url()->current() }}" method="get">
                                                <div class="input-group">
                                                    <input type="text" name="string"
                                                           value="@if(isset($_GET['string'])) {{ $_GET['string'] }} @endif"
                                                           class="form-control"
                                                           placeholder="Search by Name or Email...">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button">Search!</button>
                                                </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="ks-full-table">
                                        <table id="ks-datatable" class="table ks-table-info dt-responsive nowrap"
                                               width="100%" data-pagination="true">
                                            <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>User Role</th>
                                                <th>Last Updated</th>
                                                <th width="30%">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($users as $user)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset($user->image) }}"
                                                             class="ks-avatar" alt="" width="36" height="36">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td>
                                                        <span class="la la-envelope-o ks-icon"></span>
                                                        {{ $user->email }}
                                                    </td>
                                                    <td>
                                                        @if($user->role == 1)
                                                            <span class="badge badge-success">Admin</span>
                                                        @elseif($user->role == 2)
                                                            <span class="badge badge-warning">Moderator</span>
                                                        @else
                                                            <span class="badge badge-danger">User</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="la la-clock-o ks-icon"></span>
                                                        {{ $user->created_at->format('d-F-Y') }}
                                                    </td>
                                                    <td>
                                                        @if($user->role > 1)
                                                        <div class="pull-left">
                                                            <a href="{{ route('promote.user', ['id'=>$user->id]) }}"
                                                               onclick="return confirm('Are you sure about to promote this user?')"
                                                               class="btn btn-success-outline btn-sm">
                                                                <i class="la la-arrow-up"></i> P
                                                            </a>
                                                        </div>
                                                        @endif

                                                        @if($user->role != 3)
                                                        <div class="pull-left">
                                                            <a href="{{ route('demote.user', ['id'=>$user->id]) }}"
                                                               onclick="return confirm('Are you sure about to demote this user?')"
                                                               class="btn btn-warning-outline btn-sm">
                                                                <i class="la la-arrow-down"></i> D
                                                            </a>
                                                        </div>
                                                        @endif

                                                        @if($user->role == 3 && !$user->hasTweetPermission)
                                                            <div class="pull-left">
                                                                <a href="{{ route('tweet.access', ['id'=>$user->id]) }}"
                                                                   onclick="return confirm('Are you sure about granting tweet access to this user?')"
                                                                   class="btn btn-info-outline btn-sm">
                                                                    <i class="la la-check-square-o"></i> Grant Tweet
                                                                    Access
                                                                </a>
                                                            </div>
                                                        @elseif($user->role == 3)
                                                            <div class="pull-left">
                                                                <a href="{{ route('tweet.access', ['id'=>$user->id]) }}"
                                                                   onclick="return confirm('Are you sure about revoking tweet access of this user?')"
                                                                   class="btn btn-danger-outline btn-sm">
                                                                    <i class="la la-times-circle-o"></i> Revoke Tweet
                                                                    Access
                                                                </a>
                                                            </div>
                                                        @endif

                                                        <div class="pull-right">
                                                            <a href="{{ route('delete.user', ['id'=>$user->id]) }}"
                                                               onclick="return confirm('Are you sure about to delete this user?')"
                                                               class="btn btn-danger btn-sm">
                                                                <i class="la la-trash-o"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                        <nav>
                                            @if(count($users) > 0)

                                                <div class="alert alert-info">
                                                    Showing {{ $users->firstItem() }} to {{ $users->lastItem() }}
                                                    User of
                                                    Total {{ $users->total() }} Users.
                                                </div>

                                                <nav aria-label="Page navigation">
                                                    @if ($users->lastPage() > 1)
                                                        <ul class="pagination pagination-sm">
                                                            <li class="page-item {{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
                                                                <a class="page-link" href="{{ $users->url(1) }}">Previous</a>
                                                            </li>
                                                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                                                <li class="page-item {{ ($users->currentPage() == $i) ? 'page active' : '' }}">
                                                                    <a class="page-link"
                                                                       href="{{ $users->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                            @endfor
                                                            <li class="page-item {{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                                                                <a class="page-link"
                                                                   href="{{ $users->url($users->currentPage()+1) }}">Next</a>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </nav>
                                            @else
                                                <div class="alert alert-danger">
                                                    No Result Found!
                                                </div>
                                            @endif

                                        </nav>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection