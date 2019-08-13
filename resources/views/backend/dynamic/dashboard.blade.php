@extends('backend.index')

@section('content')

    <div class="ks-dashboard-tabbed-sidebar">
        <div class="ks-dashboard-tabbed-sidebar-widgets">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-purple">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="ks-icon-combo-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">$9.24</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Profit <span class="ks-progress-type">(+$1.89)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-green">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-pie-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">$2.190</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Total Revenue <span class="ks-progress-type">(+$1.89)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-pink">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="ks-icon-user ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">23</span>
                                <span class="ks-amount-icon ks-icon-circled-down-left"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Active Clients <span class="ks-progress-type">(+$1.89)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card ks-widget-payment-simple-amount-item ks-orange">
                        <div class="payment-simple-amount-item-icon-block">
                            <span class="la la-area-chart ks-icon"></span>
                        </div>

                        <div class="payment-simple-amount-item-body">
                            <div class="payment-simple-amount-item-amount">
                                <span class="ks-amount">$431.2</span>
                                <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                            </div>
                            <div class="payment-simple-amount-item-description">
                                Average Profit <span class="ks-progress-type">(+$1.89)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="card ks-card-widget ks-widget-payment-earnings">
                        <h5 class="card-header">
                            Next Payout

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Card</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-card-widget-datetime">
                                Activity from <span class="ks-text-bold">Jan 4, 2017</span> to <span
                                        class="ks-text-bold">Jan 10, 2017</span>
                            </div>

                            <div class="ks-payment-earnings-amount">$2.37</div>
                            <div class="ks-payment-earnings-amount-description">
                                You’ve made $230 today
                            </div>

                            <div id="ks-next-payout-chart" class="ks-payment-earnings-chart"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card ks-card-widget ks-widget-payment-earnings">
                                <h5 class="card-header">
                                    Total Earnings

                                    <div class="dropdown ks-control">
                                        <a class="btn btn-link ks-no-text ks-no-arrow"
                                           data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <span class="ks-icon la la-ellipsis-h"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right"
                                             aria-labelledby="dropdownMenu1">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Add Card</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </h5>
                                <div class="card-block">
                                    <div class="ks-card-widget-datetime">
                                        In <span class="ks-text-bold">12 Months</span>
                                    </div>

                                    <div class="ks-payment-earnings-amount">$23.54</div>
                                    <div class="ks-payment-earnings-amount-description">
                                        Last month you’ve made $230
                                    </div>

                                    <div id="ks-total-earning-chart"
                                         class="ks-payment-earnings-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card ks-widget-payment-price-ratio ks-green">
                                <div class="ks-price-ratio-title">
                                    Share Price
                                </div>
                                <div class="ks-price-ratio-amount">23.82</div>
                                <div class="ks-price-ratio-progress">
                                    <span class="ks-icon ks-icon-circled-up-right"></span>
                                    <div class="ks-text">0.32%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card ks-widget-payment-price-ratio ks-blue">
                                <div class="ks-price-ratio-title">
                                    Share Price
                                </div>
                                <div class="ks-price-ratio-amount">23.82</div>
                                <div class="ks-price-ratio-progress">
                                    <span class="ks-icon ks-icon-circled-up-right"></span>
                                    <div class="ks-text">0.32%</div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card ks-widget-payment-price-ratio ks-purple">
                                <div class="ks-price-ratio-title">
                                    Share Price
                                </div>
                                <div class="ks-price-ratio-amount">0.23</div>
                                <div class="ks-price-ratio-progress">
                                    <span class="ks-icon ks-icon-circled-down-left"></span>
                                    <div class="ks-text">1.56%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card ks-widget-payment-price-ratio ks-yellow">
                                <div class="ks-price-ratio-title">
                                    Share Price
                                </div>
                                <div class="ks-price-ratio-amount">0.23</div>
                                <div class="ks-price-ratio-progress">
                                    <span class="ks-icon ks-icon-circled-down-left"></span>
                                    <div class="ks-text">1.56%</div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3">
                    <div class="card ks-card-widget ks-widget-payment-total-amount ks-purple-light">
                        <h5 class="card-header">
                            Total Teachers

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Card</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-payment-total-amount-item-icon-block">
                                <span class="ks-icon-combo-chart ks-icon"></span>
                            </div>

                            <div class="ks-payment-total-amount-item-body">
                                <div class="ks-payment-total-amount-item-amount">
                                    <span class="ks-amount">103</span>
                                </div>
                                <div class="ks-payment-total-amount-item-description">
                                    Today status
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card ks-card-widget ks-widget-payment-total-amount ks-green-light">
                        <h5 class="card-header">
                            Total Students

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Card</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-payment-total-amount-item-icon-block">
                                <span class="la la-pie-chart ks-icon"></span>
                            </div>

                            <div class="ks-payment-total-amount-item-body">
                                <div class="ks-payment-total-amount-item-amount">
                                    <span class="ks-amount">2612</span>
                                </div>
                                <div class="ks-payment-total-amount-item-description">
                                    Today status
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card ks-card-widget ks-widget-payment-total-amount ks-pink-light">
                        <h5 class="card-header">
                            Total Admins

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Card</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-payment-total-amount-item-icon-block">
                                <span class="la la-user ks-icon"></span>
                            </div>

                            <div class="ks-payment-total-amount-item-body">
                                <div class="ks-payment-total-amount-item-amount">
                                    <span class="ks-amount">23</span>
                                </div>
                                <div class="ks-payment-total-amount-item-description">
                                    Today status
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card ks-card-widget ks-widget-payment-total-amount ks-orange-light">
                        <h5 class="card-header">
                            Others

                            <div class="dropdown ks-control">
                                <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <span class="ks-icon la la-ellipsis-h"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Card</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-payment-total-amount-item-icon-block">
                                <span class="la la-area-chart ks-icon"></span>
                            </div>

                            <div class="ks-payment-total-amount-item-body">
                                <div class="ks-payment-total-amount-item-amount">
                                    <span class="ks-amount">67</span>
                                </div>
                                <div class="ks-payment-total-amount-item-description">
                                    Today status
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card ks-card-widget ks-widget-payment-table">
                        <h5 class="card-header">
                            Recent Income

                            <div class="ks-controls">
                                <a href="#" class="ks-control-link">View all</a>
                            </div>
                        </h5>
                        <div class="card-block">
                            <table class="table ks-payment-table">
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('admin') }}/assets/img/avatars/avatar-1.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('admin') }}/assets/img/avatars/avatar-8.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('admin') }}/assets/img/avatars/avatar-9.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('admin') }}/assets/img/avatars/avatar-10.jpg"
                                             width="28" height="28"
                                             class="ks-avatar ks-img-circle"> John Doe
                                    </td>
                                    <td class="ks-text-light">Easy One Page Dashboard</td>
                                    <td class="ks-text-bold">$150</td>
                                    <td class="ks-text-light ks-text-right ks-text-no-wrap">3 days ago</td>
                                </tr>
                                <tr>
                                    <td class="ks-text-bold ks-text-no-wrap">
                                        <img src="{{ asset('admin') }}/assets/img/avatars/avatar-11.jpg"
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="card ks-card-widget ks-widget-chart-orders">
                        <h5 class="card-header">
                            Orders

                            <div class="ks-controls">
                                <a href="#" class="ks-control-link">January 2017</a>
                            </div>
                        </h5>
                        <div class="card-block">
                            <div class="ks-chart-orders-block"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection