<meta charset="UTF-8">
<title>{{ $title }}</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/fonts/line-awesome/css/line-awesome.min.css">
<!--<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/fonts/open-sans/styles.css">-->

<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/fonts/montserrat/styles.css">

<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/tether/css/tether.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/jscrollpane/jquery.jscrollpane.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/styles/common.min.css">
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/styles/themes/cornflower-blue.min.css">
<link class="ks-sidebar-dark-style" rel="stylesheet" type="text/css"
      href="{{ asset('admin') }}/assets/styles/themes/sidebar-black.min.css">
<!-- END THEME STYLES -->

<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/fonts/kosmo/styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/fonts/weather/css/weather-icons.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/c3js/c3.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/noty/noty.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/styles/widgets/payment.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/styles/widgets/panels.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/styles/dashboard/tabbed-sidebar.min.css">

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
        -moz-box-shadow: 0 4px 5px 0 rgba(0,0,0,.14), 0 1px 10px 0 rgba(0,0,0,.12), 0 2px 4px -1px rgba(0,0,0,.2);
        -webkit-box-shadow: 0 4px 5px 0 rgba(0,0,0,.14), 0 1px 10px 0 rgba(0,0,0,.12), 0 2px 4px -1px rgba(0,0,0,.2);
        /*box-shadow:         1px 1px 3px 2px #DCDCDC;"*/
        box-shadow: 0 4px 5px 0 rgba(0,0,0,.14), 0 1px 10px 0 rgba(0,0,0,.12), 0 2px 4px -1px rgba(0,0,0,.2);
    }
</style>


<script src="{{ asset('admin') }}/libs/jquery/jquery.min.js"></script>