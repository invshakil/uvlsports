<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="{{ asset('adminAssets') }}/libs/responsejs/response.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/loading-overlay/loadingoverlay.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/tether/js/tether.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/jscrollpane/jquery.jscrollpane.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/jscrollpane/jquery.mousewheel.js"></script>
<script src="{{ asset('adminAssets') }}/libs/flexibility/flexibility.js"></script>
<script src="{{ asset('adminAssets') }}/libs/noty/noty.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/velocity/velocity.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('adminAssets') }}/assets/scripts/common.min.js"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="{{ asset('adminAssets') }}/libs/d3/d3.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/c3js/c3.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/noty/noty.min.js"></script>

<script type="application/javascript">
    (function ($) {
        $(document).ready(function () {
            c3.generate({
                bindto: '#ks-next-payout-chart',
                data: {
                    columns: [
                        ['data1', 6, 5, 6, 5, 7, 8, 7]
                    ],
                    types: {
                        data1: 'area'
                    },
                    colors: {
                        data1: '#81c159'
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    show: false
                },
                point: {
                    show: false
                },
                axis: {
                    x: {show: false},
                    y: {show: false}
                }
            });

            c3.generate({
                bindto: '#ks-total-earning-chart',
                data: {
                    columns: [
                        ['data1', 6, 5, 6, 5, 7, 8, 7]
                    ],
                    types: {
                        data1: 'area'
                    },
                    colors: {
                        data1: '#4e54a8'
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    show: false
                },
                point: {
                    show: false
                },
                axis: {
                    x: {show: false},
                    y: {show: false}
                }
            });

            c3.generate({
                bindto: '.ks-chart-orders-block',
                data: {
                    columns: [
                        ['Revenue', 150, 200, 220, 280, 400, 160, 260, 400, 300, 400, 500, 420, 500, 300, 200, 100, 400, 600, 300, 360, 600],
                        ['Profit', 350, 300, 200, 140, 200, 30, 200, 100, 400, 600, 300, 200, 100, 50, 200, 600, 300, 500, 30, 200, 320]
                    ],
                    colors: {
                        'Revenue': '#f88528',
                        'Profit': '#81c159'
                    }
                },
                point: {
                    r: 5
                },
                grid: {
                    y: {
                        show: true
                    }
                }
            });


        });
    })(jQuery);
</script>

<script src="{{ asset('adminAssets') }}/libs/jquery-form-validator/jquery.form-validator.min.js"></script>
<script type="application/javascript">
    (function ($) {
        $(document).ready(function() {
            $.validate({
                modules : 'location, date, security, file',
                onModulesLoaded : function() {

                }
            });
        });
    })(jQuery);
</script>

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
            @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}";


    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>