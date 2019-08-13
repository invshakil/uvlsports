@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h4 id="form-validation-basic-demo">Create Game Week</h4>
                        <div class="card panel">
                            <div class="card-block" style="min-height: 840px">
                                <form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text"
                                               name="name"
                                               value="{{ old('name') }}"
                                               class="form-control"
                                               placeholder="Enter Name"
                                               data-validation="required"
                                               data-validation-length="6-30"
                                               data-validation-error-msg="System name has to be an alphanumeric value (6-30 chars)">
                                    </div>


                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create Game Week</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h4 id="form-validation-length">Game Week List</h4>
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
                                                           placeholder="Search by Name">
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
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($game_weeks as $key=>$game_week)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        {{ $game_week->name }}
                                                    </td>

                                                    <td>
                                                        @if($game_week->status == 1)
                                                            <span class="badge badge-success">Active</span>

                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="pull-left">
                                                            <a href="javascript:void(0)"
                                                               class="btn btn-info btn-sm edit-category"
                                                               data-id="{{ $game_week->id }}"
                                                               data-name="{{ $game_week->name }}"
                                                               data-status="{{ $game_week->status }}"
                                                               data-toggle="modal"
                                                               data-target="#EditCategory"><i
                                                                        class="la la-pencil-square-o"></i>Edit
                                                            </a>
                                                        </div>

                                                        <div class="pull-right">
                                                            <a href="{{ route('delete.game.week', ['id'=>$game_week->id]) }}"
                                                               onclick="return confirm('Are you sure about to delete this game week?')"
                                                               class="btn btn-danger btn-sm"><i
                                                                        class="la la-trash-o"></i> Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                        <nav>
                                            @if(count($game_weeks) > 0)

                                                <div class="alert alert-info">
                                                    Showing {{ $game_weeks->firstItem() }}
                                                    to {{ $game_weeks->lastItem() }}
                                                    Game Week of
                                                    Total {{ $game_weeks->total() }} Game Weeks.
                                                </div>

                                                <nav aria-label="Page navigation">
                                                    @if ($game_weeks->lastPage() > 1)
                                                        <ul class="pagination pagination-sm">
                                                            <li class="page-item {{ ($game_weeks->currentPage() == 1) ? ' disabled' : '' }}">
                                                                <a class="page-link" href="{{ $game_weeks->url(1) }}">Previous</a>
                                                            </li>
                                                            @for ($i = 1; $i <= $game_weeks->lastPage(); $i++)
                                                                <li class="page-item {{ ($game_weeks->currentPage() == $i) ? 'page active' : '' }}">
                                                                    <a class="page-link"
                                                                       href="{{ $game_weeks->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                            @endfor
                                                            <li class="page-item {{ ($game_weeks->currentPage() == $game_weeks->lastPage()) ? ' disabled' : '' }}">
                                                                <a class="page-link"
                                                                   href="{{ $game_weeks->url($game_weeks->currentPage()+1) }}">Next</a>
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

@section('after_js')

    <div class="modal fade" id="EditCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Game Week Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card panel">
                        <div class="card-block">
                            <form action="{{ route('update.game.week') }}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <input type="hidden" name="id" id="c-id">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="c-name"
                                           name="name"
                                           value="{{ old('name') }}"
                                           class="form-control"
                                           placeholder="Enter Name"
                                           data-validation="required"
                                           data-validation-length="6-30"
                                           data-validation-error-msg="System name has to be an alphanumeric value (6-30 chars)">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="c-status">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Game Week</button>
                                    <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-outline ks-light" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {

            $('#EditCategory').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var name = $(e.relatedTarget).data('name');

                var status = $(e.relatedTarget).data('status');

                $('#c-id').val(id);
                $('#c-name').val(name);

                $('select#c-status').val(status);


            });


        });


    </script>
@endsection