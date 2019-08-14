<meta charset="UTF-8">
<title>{{ $title }}</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/libs/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/fonts/line-awesome/css/line-awesome.min.css">
{{--<!--<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/fonts/open-sans/styles.css">-->--}}

<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/fonts/montserrat/styles.css">

{{--<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/libs/tether/css/tether.min.css">--}}
<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/libs/jscrollpane/jquery.jscrollpane.css">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/libs/flag-icon-css/css/flag-icon.min.css">--}}
<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/styles/common.min.css">
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/styles/themes/cornflower-blue.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/styles/themes/sidebar-black.min.css">
<!-- END THEME STYLES -->

<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/fonts/kosmo/styles.css">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/fonts/weather/css/weather-icons.min.css">--}}
{{--<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/libs/c3js/c3.min.css">--}}
{{--<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/libs/noty/noty.css">--}}
<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/styles/widgets/payment.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/styles/widgets/panels.min.css">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('adminAssets') }}/assets/styles/dashboard/tabbed-sidebar.min.css">--}}

<style>
    body.ks-page-header-fixed .ks-page-content .ks-page-content-body{
        padding-top: 5px!important;
    }

    .card{
        border-radius:5px!important;
        background-color:#ffffff;!important;
        padding:10px 10px;
        /*box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.2) inset;*/
        margin-bottom: 10px;
        -moz-box-shadow: 0 3px 1px 0 #e6e7e8;
        -webkit-box-shadow: 0 3px 1px 0 #e6e7e8;
        /*box-shadow:         1px 1px 3px 2px #DCDCDC;"*/
        box-shadow: 0 3px 1px 0 #e6e7e8;
    }

    .ks-widget-payment-simple-amount-item.ks-pink .payment-simple-amount-item-icon-block{
        background-color: #0275d8;
    }

    .ks-widget-payment-simple-amount-item.ks-orange .payment-simple-amount-item-icon-block{
        background-color: #fd0a0a;
    }

    .has-error {
        color: #d9534f;
    }
</style>


<script src="{{ asset('adminAssets') }}/libs/jquery/jquery.min.js"></script>