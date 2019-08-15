<div class="ks-column ks-sidebar ks-info">
    <div class="ks-wrapper ks-sidebar-wrapper">
        <ul class="nav nav-pills nav-stacked">

            <li class="nav-item ks-user dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <img src="{{ asset(auth()->user()->image) }}" height="36"
                         class="ks-avatar rounded-circle">
                    <div class="ks-info">
                        <div class="ks-name">{{ auth()->user()->name }}</div>
                        <div class="ks-text">@if (auth()->user()->role == 1 ) Admin @elseif(auth()->user()->role == 2)
                                Moderator @else Customer @endif</div>
                    </div>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="{{ route('account.settings') }}">Settings</a>
                </div>
            </li>

            <li class="nav-item @if(Request::url() == route('admin.dashboard')) open @endif">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <span class="ks-icon la la-dashboard"></span>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item @if(Request::url() == route('categories')) open @endif">
                <a class="nav-link" href="{{ route('categories') }}">
                    <span class="ks-icon la la-tags"></span>
                    <span>Categories</span>
                </a>
            </li>

            <li class="nav-item @if(Request::url() == route('admin.create.article')) open @endif">
                <a class="nav-link " href="{{ route('admin.create.article') }}">
                    <span class="ks-icon la la-edit"></span>
                    <span>Create Article</span>
                </a>
            </li>

            <li class="nav-item @if(Request::url() == route('admin.article.list')) open @endif">
                <a class="nav-link " href="{{ route('admin.article.list') }}">
                    <span class="ks-icon la la-info"></span>
                    <span>Manage Articles</span>
                </a>
            </li>

            <li class="nav-item  @if(Request::url() == route('create.matches.info')) open @endif">
                <a class="nav-link" href="{{ route('create.matches.info') }}">
                    <span class="ks-icon la la-calendar-check-o"></span>
                    <span>TV Schedules</span>
                </a>
            </li>

            <li class="nav-item @if(Request::url() == route('get.subscribers')) open @endif">
                <a class="nav-link" href="{{ route('get.subscribers') }}">
                    <span class="ks-icon la la-envelope-square"></span>
                    <span>Subscribers List</span>
                </a>
            </li>
            <li class="nav-item @if(Request::url() == route('user.add') || Request::url() == route('user.manage')) open @endif">
                <a class="nav-link" href="{{ route('user.add') }}">
                    <span class="ks-icon la la-users"></span>
                    <span>User Management</span>
                </a>
            </li>

            <li class="nav-item dropdown @if(Request::url() == route('set.footer.content') || Request::url() == route('manage.about_us.page')) open @endif">
                <a class="nav-link dropdown-toggle"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="ks-icon la la-cubes"></span>
                    <span>CMS</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item @if(Request::url() == route('set.footer.content')) ks-active @endif"
                       href="{{ route('set.footer.content') }}">Footer Widgets</a>
                    <a class="dropdown-item" href="{{ route('manage.about_us.page') }}">About Us Page</a>
                </div>
            </li>


            <li class="nav-item @if(Request::url() == route('system.settings')) open @endif">
                <a class="nav-link" href="{{ route('system.settings') }}">
                    <span class="ks-icon la la-cog"></span>
                    <span>System Settings</span>
                </a>
            </li>



        </ul>
        <div class="ks-sidebar-extras-block">

            <div class="ks-sidebar-copyright">© {{ date('Y') }} Shakil. All right reserved</div>
        </div>
    </div>
</div>