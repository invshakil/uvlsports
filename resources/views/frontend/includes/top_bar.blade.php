<div class="container">
    <a class="secondary-logo" href="{{ route('home') }}">
        <img class="img-responsive" src="{{ asset(logo()) }}"  style="max-width: 100px;"  alt="logo">
    </a>
</div>
<div class="topbar">
    <div class="container">
        <div id="topbar" class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="main-logo img-responsive" src="{{ asset(logo()) }}"
                     style="max-width: 120px;" alt="logo">
            </a>
            <div id="topbar-right">
                <div id="date-time"></div>
                <div id="weather"></div>

            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
</div>