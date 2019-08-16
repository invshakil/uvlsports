@extends('frontend.index')

@section('title') {{ $title }} @endsection
@section('image') {{ $image }} @endsection
@section('description') {{ $description }} @endsection
@section('keyword') {{ $keyword }} @endsection
@section('author') {{ $author }} @endsection


@section('after_style')
    <link href="{{ asset('frontend/css/account.css') }}" rel="stylesheet">

    <style>
        .article-submit {
            padding: 20px 5px 20px 5px;
        }

        @media only screen and (min-width: 900px) {
            .inner-body, .inner-box {
                min-height: 700px;
            }
        }

        thead tr {
            background-color: orangered;
            color: white;
        }
    </style>
@endsection

@section('content')

    <div class="container">

        <div class="section account">
            <div class="row">

                <div class="col-sm-12 page-content">
                    <div class="inner-box">

                        <h2 class="title-2">
                            খেলার সময়সূচী
                        </h2>

                        @if($game_week_name)
                        <h4>
                            {{ $game_week_name }}
                        </h4>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url()->current() }}" method="get">
                                    <input type="text" name="search" id="search" class="form-control"
                                           placeholder="Search By Team Name, Channel Name">
                                </form>
                            </div>
                        </div>

                        <hr>

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped  table">
                                <thead>
                                <tr>
                                    <th data-type="numeric" data-sort-initial="true">#</th>
                                    <th> Match Name</th>
                                    <th> Channel</th>
                                    <th data-sort-ignore="true"> Tournament</th>
                                    <th data-type="numeric">Match Time</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($match_schedules as $key=>$match_schedule)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td> {{ $match_schedule->title }}</td>
                                        <td>
                                            {{ $match_schedule->channel_name }}
                                        </td>
                                        <td>
                                            {{ $match_schedule->tournament->name }}
                                        </td>
                                        <td>
                                            {{ date('l, dS F Y h:i A', strtotime($match_schedule->time)) }}
                                        </td>
                                    </tr>
                                @endforeach
                                @if(count($match_schedules) == 0)
                                    <tr>
                                        <td class="danger" colspan="5">
                                            No Information available.
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!--/.section-->
            </div>
        </div>
    </div>

@endsection

@section('after_script')

    <script>
        $(document).ready(function () {
            $(".table > tbody > tr:odd").css("background", '#dee2e6');
        });

        $(document).ajaxStart(function () {
            Pace.restart();
        });


        tbody_text = $('tbody').html();
        /* Search Match */
        $("#search").keyup(function () {

            var str = $("#search").val();

            if (str.length > 2) {
                $.get("{{ url('match-schedule/search?string=') }}" + str, function (data) {

                    console.log(data);
                    if (data.length > 0) {

                        rows = '';

                        $.each(data, function (key, value) {

                            rows = rows + '<tr>';
                            rows = rows + '<td>' + (value.key + 1) + '</td>';
                            rows = rows + '<td>' + value.title + '</td>';
                            rows = rows + '<td>' + value.channel_name + '</td>';
                            rows = rows + '<td>' + value.tournament.name + '</td>';
                            rows = rows + '<td>' + value.time.toString('yyyy-MM-dd HH:mm') + '</td>';
                            rows = rows + '</tr>';
                        });


                        $("tbody").html(rows);

                    }
                    else {
                        $('tbody').html('<tr><td colspan="5"><div class="alert dark alert-danger">Nothing Found!</div></td></tr>')
                    }

                });
            } else {
                $('tbody').html(tbody_text);
            }
        });

    </script>
@endsection
