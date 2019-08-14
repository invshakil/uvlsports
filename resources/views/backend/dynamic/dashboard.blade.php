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
                       <div id="lineChartData" style="height: 390px; width: 100%;"></div>
                   </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-xl-5">
                        <div class="card widget">
                            <div id="pieChartData" style="height: 330px; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                    <div class="card ks-card-widget ks-widget-payment-table">
                        <h5 class="card-header">
                            Recent Articles

                            <div class="ks-controls">
                                <a href="#" class="ks-control-link">View all</a>
                            </div>
                        </h5>
                        <div class="card-block">
                            <table class="table ks-payment-table">
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('adminAssets') }}/assets/img/avatars/avatar-1.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('adminAssets') }}/assets/img/avatars/avatar-8.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('adminAssets') }}/assets/img/avatars/avatar-9.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('adminAssets') }}/assets/img/avatars/avatar-10.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('adminAssets') }}/assets/img/avatars/avatar-11.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("pieChartData", {
                animationEnabled: true,
                title: {
                    text: "Visitor Status"
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: [
                        {y: 79.45, label: "Returning Visitor"},
                        {y: 20.55, label: "New Visitor"},
                    ]
                }]
            });
            chart.render();


            var lineChart = new CanvasJS.Chart("lineChartData", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Site Traffic"
                },
                axisX:{
                    valueFormatString: "DD MMM",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    title: "Number of Visits",
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip:{
                    shared:true
                },
                legend:{
                    cursor:"pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries
                },
                data: [{
                    type: "line",
                    showInLegend: true,
                    name: "Total Visit",
                    markerType: "square",
                    xValueFormatString: "DD MMM, YYYY",
                    color: "#F08080",
                    dataPoints: [
                        { x: new Date(2017, 0, 3), y: 650 },
                        { x: new Date(2017, 0, 4), y: 700 },
                        { x: new Date(2017, 0, 5), y: 710 },
                        { x: new Date(2017, 0, 6), y: 658 },
                        { x: new Date(2017, 0, 7), y: 734 },
                        { x: new Date(2017, 0, 8), y: 963 },
                        { x: new Date(2017, 0, 9), y: 847 },
                        { x: new Date(2017, 0, 10), y: 853 },
                        { x: new Date(2017, 0, 11), y: 869 },
                        { x: new Date(2017, 0, 12), y: 943 },
                        { x: new Date(2017, 0, 13), y: 970 },
                        { x: new Date(2017, 0, 14), y: 869 },
                        { x: new Date(2017, 0, 15), y: 890 },
                        { x: new Date(2017, 0, 16), y: 930 }
                    ]
                },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Unique Visit",
                        lineDashType: "dash",
                        dataPoints: [
                            { x: new Date(2017, 0, 3), y: 510 },
                            { x: new Date(2017, 0, 4), y: 560 },
                            { x: new Date(2017, 0, 5), y: 540 },
                            { x: new Date(2017, 0, 6), y: 558 },
                            { x: new Date(2017, 0, 7), y: 544 },
                            { x: new Date(2017, 0, 8), y: 693 },
                            { x: new Date(2017, 0, 9), y: 657 },
                            { x: new Date(2017, 0, 10), y: 663 },
                            { x: new Date(2017, 0, 11), y: 639 },
                            { x: new Date(2017, 0, 12), y: 673 },
                            { x: new Date(2017, 0, 13), y: 660 },
                            { x: new Date(2017, 0, 14), y: 562 },
                            { x: new Date(2017, 0, 15), y: 643 },
                            { x: new Date(2017, 0, 16), y: 570 }
                        ]
                    }]
            });
            lineChart.render();

            function toogleDataSeries(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else{
                    e.dataSeries.visible = true;
                }
                lineChart.render();
            }
        }


    </script>
@endsection