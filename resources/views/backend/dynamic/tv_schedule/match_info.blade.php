@extends('backend.index')


@section('after_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/flatpickr/flatpickr.min.css"> <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/styles/libs/flatpickr/flatpickr.min.css"> <!-- customization -->

@endsection
@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h4 id="form-validation-basic-demo">Create Match Schedule Info</h4>
                        <div class="card panel">
                            <div class="card-block" style="min-height: 840px">
                                <form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Match Name</label>
                                        <input type="text"
                                               name="title"
                                               value="{{ old('title') }}"
                                               class="form-control"
                                               placeholder="Enter Match Name"
                                               data-validation="required"
                                               data-validation-length="6-50"
                                               data-validation-error-msg="Match Info has to be an alphanumeric value (6-50 chars)">
                                    </div>

                                    <div class="form-group">
                                        <label>Channel Name</label>
                                        <input type="text"
                                               name="channel_name"
                                               value="{{ old('channel_name') }}"
                                               class="form-control"
                                               placeholder="Enter Channel Name"
                                               data-validation="required"
                                               data-validation-length="6-50"
                                               data-validation-error-msg="Channel Name has to be an alphanumeric value (6-50 chars)">
                                    </div>

                                    <div class="form-group">
                                        <label for="">
                                            Game Week
                                        </label>
                                        <select name="game_week_id" class="form-control">
                                            @foreach($game_weeks as $game_week)

                                                <option value="{{ $game_week->id }}">{{ $game_week->name }}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">
                                            Tournament
                                        </label>
                                        <select name="tournament_id" class="form-control">
                                            @foreach($tournaments as $tournament)

                                                <option value="{{ $tournament->id }}">{{ $tournament->name }}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Time</label>
                                        <input type="text"
                                               id="time"
                                               name="time"
                                               data-enable-time="true"
                                               value="{{ old('name') }}"
                                               class="form-control flatpickr">
                                    </div>


                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create Match Schedule
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h4 id="form-validation-length">Match Schedule Info List</h4>
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
                                                <th>Match</th>
                                                <th>Game Week</th>
                                                <th>Tournament</th>
                                                <th>Time</th>
                                                <th>Channel</th>
                                                <th>Status</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($match_schedules as $key=>$match_schedule)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        {{ $match_schedule->title }}
                                                    </td>

                                                    <td>
                                                        {{ $match_schedule->game_week->name }}
                                                    </td>

                                                    <td>
                                                        {{ $match_schedule->tournament->name }}
                                                    </td>

                                                    <td>
                                                        {{ date('l, dS F Y h:i A', strtotime($match_schedule->time)) }}
                                                    </td>

                                                    <td>
                                                        {{ $match_schedule->channel_name }}
                                                    </td>

                                                    <td>
                                                        @if($match_schedule->status == 1)
                                                            <span class="badge badge-success">Active</span>

                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="pull-left">
                                                            <a href="javascript:void(0)"
                                                               class="btn btn-info btn-sm edit-category"
                                                               data-id="{{ $match_schedule->id }}"
                                                               data-game_week="{{ $match_schedule->game_week_id }}"
                                                               data-tournament="{{ $match_schedule->tournament_id }}"
                                                               data-time="{{ $match_schedule->time }}"
                                                               data-title="{{ $match_schedule->title }}"
                                                               data-c-name="{{ $match_schedule->channel_name }}"
                                                               data-status="{{ $match_schedule->status }}"
                                                               data-toggle="modal"
                                                               data-target="#EditCategory"><i
                                                                        class="la la-pencil-square-o"></i>Edit
                                                            </a>
                                                        </div>

                                                        <div class="pull-right">
                                                            <a href="{{ route('delete.matches.info', ['id'=>$match_schedule->id]) }}"
                                                               onclick="return confirm('Are you sure about to delete this Match Schedule Info?')"
                                                               class="btn btn-danger btn-sm"><i
                                                                        class="la la-trash-o"></i> Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                        <nav>
                                            @if(count($match_schedules) > 0)

                                                <div class="alert alert-info">
                                                    Showing {{ $match_schedules->firstItem() }}
                                                    to {{ $match_schedules->lastItem() }}
                                                    Match Schedule Info of
                                                    Total {{ $match_schedules->total() }} Match Schedule Infos.
                                                </div>

                                                <nav aria-label="Page navigation">
                                                    @if ($match_schedules->lastPage() > 1)
                                                        <ul class="pagination pagination-sm">
                                                            <li class="page-item {{ ($match_schedules->currentPage() == 1) ? ' disabled' : '' }}">
                                                                <a class="page-link"
                                                                   href="{{ $match_schedules->url(1) }}">Previous</a>
                                                            </li>
                                                            @for ($i = 1; $i <= $match_schedules->lastPage(); $i++)
                                                                <li class="page-item {{ ($match_schedules->currentPage() == $i) ? 'page active' : '' }}">
                                                                    <a class="page-link"
                                                                       href="{{ $match_schedules->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                            @endfor
                                                            <li class="page-item {{ ($match_schedules->currentPage() == $match_schedules->lastPage()) ? ' disabled' : '' }}">
                                                                <a class="page-link"
                                                                   href="{{ $match_schedules->url($match_schedules->currentPage()+1) }}">Next</a>
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
                    <h5 class="modal-title">Edit Match Schedule Info Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card panel">
                        <div class="card-block">
                            <form action="{{ route('update.matches.info') }}" method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <input type="hidden" name="id" id="c-id">

                                <div class="form-group">
                                    <label>Match Name</label>
                                    <input type="text" id="c-title"
                                           name="title"
                                           value="{{ old('title') }}"
                                           class="form-control"
                                           placeholder="Enter Match Name"
                                           data-validation="required"
                                           data-validation-length="6-30"
                                           data-validation-error-msg="System name has to be an alphanumeric value (6-30 chars)">
                                </div>


                                <div class="form-group">
                                    <label>Channel Name</label>
                                    <input type="text" id="c-c-name"
                                           name="channel_name"
                                           value="{{ old('channel_name') }}"
                                           class="form-control"
                                           placeholder="Enter Channel Name"
                                           data-validation="required"
                                           data-validation-length="6-30"
                                           data-validation-error-msg="System name has to be an alphanumeric value (6-30 chars)">
                                </div>


                                <div class="form-group">
                                    <label for="">
                                        Game Week
                                    </label>
                                    <select name="game_week_id" class="form-control" id="c-gw">
                                        @foreach($game_weeks as $game_week)

                                            <option value="{{ $game_week->id }}">{{ $game_week->name }}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        Tournament
                                    </label>
                                    <select name="tournament_id" class="form-control" id="c-trn">
                                        @foreach($tournaments as $tournament)

                                            <option value="{{ $tournament->id }}">{{ $tournament->name }}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="text"
                                           id="c-time"
                                           name="time"
                                           data-enable-time="true"
                                           value="{{ old('name') }}"
                                           class="form-control flatpickr">
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
                                    <button type="submit" class="btn btn-primary">Update Match Schedule Info</button>
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
                var title = $(e.relatedTarget).data('title');
                var channel = $(e.relatedTarget).data('c-name');
                var game_week = $(e.relatedTarget).data('game_week');
                var tournament = $(e.relatedTarget).data('tournament');
                var time = $(e.relatedTarget).data('time');

                var status = $(e.relatedTarget).data('status');

                $('#c-id').val(id);
                $('#c-title').val(title);
                $('#c-c-name').val(channel);
                $('#c-time').val(time);

                $('select#c-gw').val(game_week);
                $('select#c-trn').val(tournament);
                $('select#c-status').val(status);


            });


        });


    </script>

    <script src="{{ asset('admin') }}/libs/flatpickr/flatpickr.min.js"></script>
    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                $('.flatpickr').flatpickr();
                $("#flatpickr-disable-range").flatpickr({
                    disable: [
                        {
                            from: "2016-08-16",
                            to: "2016-08-19"
                        },
                        "2016-08-24",
                        new Date().fp_incr(30) // 30 days from now
                    ]
                });
            });
        })(jQuery);
    </script>
@endsection