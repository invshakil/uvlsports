<!DOCTYPE html>
<html lang="en">

<!-- BEGIN HEAD -->
<head>
    {{--Header script file loads--}}

    @include('backend.includes.header_script')

    @yield('after_css')

</head>
<!-- END HEAD -->

<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-cornflower-blue  ks-page-loading">
<!-- remove ks-page-header-fixed to unfix header -->

<!-- BEGIN HEADER -->
<nav class="navbar ks-navbar">
    <!-- BEGIN HEADER INNER -->
    <!-- BEGIN LOGO -->
    <div href="index.html" class="navbar-brand">
        <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->
        <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <a href="#" class="ks-sidebar-mobile-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <!-- END RESPONSIVE SIDEBAR TOGGLER -->

        <div class="ks-navbar-logo">
            <a href="{{ route('admin.dashboard') }}" class="ks-logo">UVL SPORTS</a>

            <!-- BEGIN GRID NAVIGATION -->

            <!-- END GRID NAVIGATION -->
        </div>
    </div>
    <!-- END LOGO -->

    <!-- BEGIN MENUS -->


{{--IMPORTING STICKY TOP MENU --}}
@include('backend.includes.top_sticky_menu')

<!-- END MENUS -->
    <!-- END HEADER INNER -->
</nav>
<!-- END HEADER -->


<div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs">

    <!-- BEGIN DEFAULT SIDEBAR -->

{{--IMPORTING NAVIGATION--}}
@include('backend.navigation')

<!-- END DEFAULT SIDEBAR -->


    <div class="ks-column ks-page">

        {{--IF MODULE DONT HAVE ANY NAVIGATION THEN IT WONT CREATE EXTRA SPACE HERE--}}

        @if(isset($module_navigation))

            @yield('module_navigation')

        @endif

        <div class="ks-page-header" style="position:relative;width: 100%!important;@if(!isset($module_navigation)) top: 0; @endif">
            <section class="ks-title-and-subtitle">
                <div class="ks-title-block">
                    <h3 class="ks-main-title">{{ $title }}</h3>
                </div>

            </section>
        </div>

        <div class="ks-page-content">
            <div class="ks-page-content-body" style="padding-top: 0">

                {{--DYNAMIC PAGE--}}
                @yield('content')

            </div>
        </div>
    </div>
</div>

{{--IMPORTING SCRIPT--}}
@include('backend.includes.footer_script')

@yield('after_js')

<div class="ks-mobile-overlay"></div>

<!-- BEGIN SETTINGS BLOCK -->
{{--@include('backend.includes.layout_settings')--}}
<!-- END SETTINGS BLOCK -->
</body>
</html>