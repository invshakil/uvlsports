@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-purple">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-tags ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $totalCategories }}</span>
                                {{--<span class="ks-amount-icon ks-icon-circled-up-right"></span>--}}
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Categories
                                {{--<span class="ks-progress-type">(+$1.89)</span>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-green">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-check-circle-o ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $totalRegisteredUsers }}</span>
                                {{--<span class="ks-amount-icon ks-icon-circled-up-right"></span>--}}
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Registered User
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-pink">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-users ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $totalAuthors }}</span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Authors
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-orange">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-user-plus ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">{{ $totalAdmins }}</span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Admins
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="col-xl-12">
                        <div class="card ks-card-widget ks-widget-payment-total-amount ks-purple-light">
                        <h5 class="card-header">
                            Total Published Article

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="{{ route('admin.create.article') }}">Create
                                        Article</a>
                                    <a class="dropdown-item" href="{{ route('admin.article.list') }}">Manage
                                        Articles</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-payment-total-amount-item-icon-block">
                                <span class="la la-toggle-on ks-icon"></span>
                            </div>

                            <div class="ks-payment-total-amount-item-body">
                                <div class="ks-payment-total-amount-item-amount">
                                    <span class="ks-amount">{{ $totalPublishedArticle }}</span>
                                </div>
                                {{--<div class="ks-payment-total-amount-item-description">--}}
                                {{--Today status--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card ks-card-widget ks-widget-payment-total-amount ks-green-light">
                        <h5 class="card-header">
                            Total Pending Articles

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="{{ route('admin.create.article') }}">Create
                                        Article</a>
                                    <a class="dropdown-item" href="{{ route('admin.article.list') }}">Manage
                                        Articles</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-payment-total-amount-item-icon-block">
                                <span class="la la-toggle-off ks-icon"></span>
                            </div>

                            <div class="ks-payment-total-amount-item-body">
                                <div class="ks-payment-total-amount-item-amount">
                                    <span class="ks-amount">{{ $totalPendingArticle }}</span>
                                </div>
                                {{--<div class="ks-payment-total-amount-item-description">--}}
                                {{--Today status--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                   <div class="card widget">
                       <canvas id="lineChartData" style="height: 390px; width: 100%;"></canvas>
                   </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-xl-5">
                        <div class="card widget">
                            <canvas id="pieChartData" style="height: 345px; width: 100%;"></canvas>
                        </div>
                    </div>
                    <div class="col-xl-7">
                    <div class="card ks-card-widget ks-widget-payment-table">
                        <h5 class="card-header">
                            Most Visited Page
                        </h5>
                        <div class="card-block" style="min-height: 295px">
                            <table class="table ks-payment-table">
                                @foreach($mostVisitedPage as $item)
                                <tr>
                                    <td class="ks-text-light">
                                        <a href="{{ url('/').$item['url'] }}"
                                           target="_blank">{{ $item['pageTitle'] }}</a>
                                    </td>
                                    <td class="ks-text-bold">Total Page Views: {{ $item['pageViews'] }}</td>
                                </tr>
                                @endforeach
                                @if(count($mostVisitedPage) == 0)
                                    <tr>
                                        <td class="ks-text-light text-left" colspan="2">
                                            No Information Available
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('after_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

    {{--LINE CHART DATA--}}

    <script>
        let lastThirtyDaysTotalVisitorsAndPageViews = '{!! $lastThirtyDaysTotalVisitorsAndPageViews !!}';
        lastThirtyDaysTotalVisitorsAndPageViews = JSON.parse(lastThirtyDaysTotalVisitorsAndPageViews)
        var ctx = document.getElementById('lineChartData').getContext('2d');
        var lineChart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: lastThirtyDaysTotalVisitorsAndPageViews.label,
                datasets: [{
                    label: "Number of Visitor",
                    backgroundColor: 'rgb(255, 0, 0, 1)',
                    borderColor: 'rgb(255, 0, 0, 0.3)',
                    fill: false,
                    data: lastThirtyDaysTotalVisitorsAndPageViews.visitors,
                }, {
                    label: "Page Views",
                    backgroundColor: 'rgb(10, 10, 10, 1)',
                    borderColor: 'rgb(10, 10, 10, 0.3)',
                    fill: false,
                    data: lastThirtyDaysTotalVisitorsAndPageViews.pageViews,
                }]
            },

            // Configuration options go here
            options: {
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Website Traffic Data',
                    position: 'bottom'
                },
                animation: {
                    duration: 5000,
                    onProgress: function (animation) {
                        ctx.value = animation.currentStep / animation.numSteps;
                    },
                    onComplete: function () {
                        window.setTimeout(function () {
                            ctx.value = 0;
                        }, 5000);
                    }
                }
            }
        });
    </script>

    {{--PIE CHART DATA--}}

    <script>
        let userType = '{!! $userType !!}';
        userType = JSON.parse(userType)
        if (userType.length === 0) {
            userType.push({type: 'Returning Visitor', sessions: 90})
            userType.push({type: 'New Visitor', sessions: 10})
        }
        var canvas = document.getElementById("pieChartData");
        var ctx = canvas.getContext('2d');
        var data = {
            labels: [
                userType[0].type,
                userType[1].type
            ],
            datasets: [
                {
                    fill: true,
                    backgroundColor: [
                        '#e74c3c',
                        '#34495e',
                    ],
                    data: [
                        userType[0].sessions,
                        userType[1].sessions
                    ],
                    borderColor: [
                        '#e74c3c',
                        '#34495e',
                    ],
                    borderWidth: [2, 2]
                }
            ]
        };
        var options = {
            title: {
                display: true,
                text: 'Visitor Status',
                position: 'bottom'
            },
            rotation: -0.7 * Math.PI,
            animation: {
                duration: 5000,
                onProgress: function (animation) {
                    ctx.value = animation.currentStep / animation.numSteps;
                },
                onComplete: function () {
                    window.setTimeout(function () {
                        ctx.value = 0;
                    }, 5000);
                }
            }
        };

        // Chart declaration:
        var pieChartData = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });

    </script>
@endsection