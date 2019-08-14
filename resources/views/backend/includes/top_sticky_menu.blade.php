<div class="ks-wrapper">
    <nav class="nav navbar-nav">
        <!-- BEGIN NAVBAR MENU -->
        <div class="ks-navbar-menu">
            <form class="ks-search-form">
                <a class="ks-search-open" href="#">
                    <span class="la la-search"></span>
                </a>
                <div class="ks-wrapper">
                    <div class="input-icon icon-right icon icon-lg icon-color-primary">
                        <input id="input-group-icon-text" type="text" class="form-control" placeholder="Search...">
                        <span class="icon-addon">
                                <span class="la la-search ks-icon"></span>
                            </span>
                    </div>
                    <a class="ks-search-close" href="#">
                        <span class="la la-close"></span>
                    </a>
                </div>
            </form>
            <a class="nav-item nav-link" href="{{ route('home') }}" target="_blank">Visit Website</a>

            {{--<div class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
                   {{--aria-haspopup="true" aria-expanded="false">--}}
                    {{--Dropdown--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu ks-info" aria-labelledby="Preview">--}}
                    {{--<a class="dropdown-item ks-active" href="#">Dropdown Link 1</a>--}}
                    {{--<a class="dropdown-item" href="#">Dropdown Link 2</a>--}}
                    {{--<a class="dropdown-item" href="#">Dropdown Link 3</a>--}}
                    {{--<div class="dropdown-item dropdown">--}}
                        {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
                           {{--aria-haspopup="true" aria-expanded="false">--}}
                            {{--Dropdown--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu" aria-labelledby="Preview">--}}
                            {{--<a class="dropdown-item" href="#">Dropdown Link 1</a>--}}
                            {{--<a class="dropdown-item" href="#">Dropdown Link 2</a>--}}
                            {{--<a class="dropdown-item" href="#">Dropdown Link 3</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
        <!-- END NAVBAR MENU -->

        <!-- BEGIN NAVBAR ACTIONS -->
        <div class="ks-navbar-actions">

            <!-- END NAVBAR ACTION BUTTON -->


            <!-- BEGIN NAVBAR MESSAGES -->
            {{--<div class="nav-item dropdown ks-messages">--}}
                {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
                   {{--aria-haspopup="true" aria-expanded="false">--}}
                        {{--<span class="la la-envelope ks-icon" aria-hidden="true">--}}
                            {{--<span class="badge badge-pill badge-info">3</span>--}}
                        {{--</span>--}}
                    {{--<span class="ks-text">Messages</span>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">--}}
                    {{--<section class="ks-tabs-actions">--}}
                        {{--<a href="#"><i class="la la-plus ks-icon"></i></a>--}}
                        {{--<a href="#"><i class="la la-search ks-icon"></i></a>--}}
                    {{--</section>--}}
                    {{--<ul class="nav nav-tabs ks-nav-tabs ks-info" role="tablist">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link active" href="#" data-toggle="tab"--}}
                               {{--data-target="#ks-navbar-messages-inbox" role="tab">Inbox</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#ks-navbar-messages-sent"--}}
                               {{--role="tab">Sent</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#ks-navbar-messages-archive"--}}
                               {{--role="tab">Archive</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane ks-messages-tab active" id="ks-navbar-messages-inbox" role="tabpanel">--}}
                            {{--<div class="ks-wrapper ks-scrollable">--}}
                                {{--<a href="#" class="ks-message">--}}
                                    {{--<div class="ks-avatar ks-online">--}}
                                        {{--<img src="{{ asset('admin') }}/assets/img/avatars/avatar-1.jpg" width="36"--}}
                                             {{--height="36">--}}
                                    {{--</div>--}}
                                    {{--<div class="ks-info">--}}
                                        {{--<div class="ks-user-name">Emily Carter</div>--}}
                                        {{--<div class="ks-text">In golf, Danny Willett (pictured) wins the M...</div>--}}
                                        {{--<div class="ks-datetime">1 minute ago</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="#" class="ks-message">--}}
                                    {{--<div class="ks-avatar ks-online">--}}
                                        {{--<img src="{{ asset('admin') }}/assets/img/avatars/avatar-5.jpg" width="36"--}}
                                             {{--height="36">--}}
                                    {{--</div>--}}
                                    {{--<div class="ks-info">--}}
                                        {{--<div class="ks-user-name">Emily Carter</div>--}}
                                        {{--<div class="ks-text">In golf, Danny Willett (pictured) wins the M...</div>--}}
                                        {{--<div class="ks-datetime">1 minute ago</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="#" class="ks-message">--}}
                                    {{--<div class="ks-avatar ks-offline">--}}
                                        {{--<img src="{{ asset('admin') }}/assets/img/avatars/placeholders/ava-36.png"--}}
                                             {{--width="36"--}}
                                             {{--height="36">--}}
                                    {{--</div>--}}
                                    {{--<div class="ks-info">--}}
                                        {{--<div class="ks-user-name">Emily Carter</div>--}}
                                        {{--<div class="ks-text">In golf, Danny Willett (pictured) wins the M...</div>--}}
                                        {{--<div class="ks-datetime">1 minute ago</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="#" class="ks-message">--}}
                                    {{--<div class="ks-avatar ks-offline">--}}
                                        {{--<img src="{{ asset('admin') }}/assets/img/avatars/avatar-4.jpg" width="36"--}}
                                             {{--height="36">--}}
                                    {{--</div>--}}
                                    {{--<div class="ks-info">--}}
                                        {{--<div class="ks-user-name">Emily Carter</div>--}}
                                        {{--<div class="ks-text">In golf, Danny Willett (pictured) wins the M...</div>--}}
                                        {{--<div class="ks-datetime">1 minute ago</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="ks-view-all">--}}
                                {{--<a href="#">View all</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane ks-empty" id="ks-navbar-messages-sent" role="tabpanel">--}}
                            {{--There are no messages.--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane ks-empty" id="ks-navbar-messages-archive" role="tabpanel">--}}
                            {{--There are no messages.--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- END NAVBAR MESSAGES -->

            <!-- BEGIN NAVBAR NOTIFICATIONS -->
            {{--<div class="nav-item dropdown ks-notifications">--}}
                {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
                   {{--aria-haspopup="true" aria-expanded="false">--}}
                        {{--<span class="la la-bell ks-icon" aria-hidden="true">--}}
                            {{--<span class="badge badge-pill badge-info">7</span>--}}
                        {{--</span>--}}
                    {{--<span class="ks-text">Notifications</span>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">--}}
                    {{--<ul class="nav nav-tabs ks-nav-tabs ks-info" role="tablist">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link active" href="#" data-toggle="tab"--}}
                               {{--data-target="#navbar-notifications-all" role="tab">All</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="#" data-toggle="tab"--}}
                               {{--data-target="#navbar-notifications-activity" role="tab">Activity</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="#" data-toggle="tab"--}}
                               {{--data-target="#navbar-notifications-comments" role="tab">Comments</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane ks-notifications-tab active" id="navbar-notifications-all"--}}
                             {{--role="tabpanel">--}}
                            {{--<div class="ks-wrapper ks-scrollable">--}}
                                {{--<a href="#" class="ks-notification">--}}
                                    {{--<div class="ks-avatar">--}}
                                        {{--<img src="{{ asset('admin') }}/assets/img/avatars/avatar-3.jpg" width="36"--}}
                                             {{--height="36">--}}
                                    {{--</div>--}}
                                    {{--<div class="ks-info">--}}
                                        {{--<div class="ks-user-name">Emily Carter <span class="ks-description">has uploaded 1 file</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="ks-text"><span class="la la-file-text-o ks-icon"></span> logo--}}
                                            {{--vector doc--}}
                                        {{--</div>--}}
                                        {{--<div class="ks-datetime">1 minute ago</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="#" class="ks-notification">--}}
                                    {{--<div class="ks-action">--}}
                                            {{--<span class="ks-default">--}}
                                                {{--<span class="la la-briefcase ks-icon"></span>--}}
                                            {{--</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="ks-info">--}}
                                        {{--<div class="ks-user-name">New project created</div>--}}
                                        {{--<div class="ks-text">Dashboard UI</div>--}}
                                        {{--<div class="ks-datetime">1 minute ago</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="#" class="ks-notification">--}}
                                    {{--<div class="ks-action">--}}
                                            {{--<span class="ks-error">--}}
                                                {{--<span class="la la-times-circle ks-icon"></span>--}}
                                            {{--</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="ks-info">--}}
                                        {{--<div class="ks-user-name">File upload error</div>--}}
                                        {{--<div class="ks-text"><span class="la la-file-text-o ks-icon"></span> logo--}}
                                            {{--vector doc--}}
                                        {{--</div>--}}
                                        {{--<div class="ks-datetime">10 minutes ago</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<div class="ks-view-all">--}}
                                {{--<a href="#">Show more</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane ks-empty" id="navbar-notifications-activity" role="tabpanel">--}}
                            {{--There are no activities.--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane ks-empty" id="navbar-notifications-comments" role="tabpanel">--}}
                            {{--There are no comments.--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- END NAVBAR NOTIFICATIONS -->

            <!-- BEGIN NAVBAR USER -->
            <div class="nav-item dropdown ks-user">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                        <span class="ks-avatar">
                            <img src="{{ asset(auth()->user()->image) }}" height="36" >
                        </span>
                    <span class="ks-info">
                            <span class="ks-name">{{ auth()->user()->name }}</span>
                            <span class="ks-description">
                                @if(auth()->user()->role == 1)
                                    Admin
                                @else
                                    Moderator
                                @endif
                            </span>
                        </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
                    <a class="dropdown-item" href="#">
                        <span class="la la-user ks-icon"></span>
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('account.settings') }}">
                        <span class="la la-wrench ks-icon" aria-hidden="true"></span>
                        <span>Settings</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <span class="la la-sign-out ks-icon" aria-hidden="true"></span>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            <!-- END NAVBAR USER -->
        </div>
        <!-- END NAVBAR ACTIONS -->
    </nav>

    <!-- BEGIN NAVBAR ACTIONS TOGGLER -->
    <nav class="nav navbar-nav ks-navbar-actions-toggle">
        <a class="nav-item nav-link" href="#">
            <span class="la la-ellipsis-h ks-icon ks-open"></span>
            <span class="la la-close ks-icon ks-close"></span>
        </a>
    </nav>
    <!-- END NAVBAR ACTIONS TOGGLER -->

    <!-- BEGIN NAVBAR MENU TOGGLER -->
    <nav class="nav navbar-nav ks-navbar-menu-toggle">
        <a class="nav-item nav-link" href="#">
            <span class="la la-th ks-icon ks-open"></span>
            <span class="la la-close ks-icon ks-close"></span>
        </a>
    </nav>
    <!-- END NAVBAR MENU TOGGLER -->
</div>