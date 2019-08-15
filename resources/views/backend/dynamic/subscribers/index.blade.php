@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4 id="form-validation-length">Category List</h4>
                        <div class="card panel">
                            <div class="card-block" style="min-height: 875px">
                                <div class="ks-user-list-view-table">

                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <form action="{{ url()->current() }}" method="get">
                                                <div class="input-group">
                                                    <input type="text" name="string"
                                                           value="@if(isset($_GET['string'])) {{ $_GET['string'] }} @endif"
                                                           class="form-control"
                                                           placeholder="Search by Name">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit">Search</button>
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
                                                <th>Email</th>
                                                <th>Subscription Status</th>
                                                <th>Subscribed at</th>
                                                <th>Last update</th>
                                                <th style="text-align: right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($subscribers as $subscriber)
                                                <tr>
                                                    <td>
                                                        <a href="mailto:{{ $subscriber->email }}">{{ $subscriber->email }}</a>
                                                    </td>
                                                    <td>
                                                        @if($subscriber->status == 1)
                                                            <span class="badge badge-success">Active</span>

                                                        @else
                                                            <span class="badge badge-danger">Unsubscribed</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $subscriber->created_at->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        {{ $subscriber->updated_at->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        <div class="pull-right">
                                                            <a href="{{ route('delete.subscriber', ['id'=>$subscriber->id]) }}"
                                                               onclick="return confirm('Are you sure about to delete this subscriber?')"
                                                               class="btn btn-danger btn-sm"><i
                                                                        class="la la-trash-o"></i> Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                        <nav>
                                            @if(count($subscribers) > 0)

                                                <div class="alert alert-info">
                                                    Showing {{ $subscribers->firstItem() }}
                                                    to {{ $subscribers->lastItem() }}
                                                    Subscriber of
                                                    Total {{ $subscribers->total() }} Subscribers.
                                                </div>

                                                <nav aria-label="Page navigation">
                                                    {{ $subscribers->links('vendor.pagination.bootstrap-4') }}
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

@section('after_js')

@endsection