@extends('backend.index')

@section('content')

    <div class="ks-column ks-page">
        <div class="ks-page-header">
            <section class="ks-title">
                <h3>CRM / Roles &amp; Permissions</h3>

                <button class="btn btn-primary-outline ks-light ks-crm-contacts-user-view-column-toggle"
                        data-block-toggle=".ks-crm-contacts-user-view-column">User Panel
                </button>
            </section>
        </div>
        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="dm-roles-permissions-wrap">
                    <div class="ks-navigation ks-browse ks-scrollable ks-roles-permissions-roles" data-auto-height>
                        <div class="ks-wrapper">
                            <div class="ks-separator">
                                Roles
                            </div>
                            <ul class="ks-menu">
                                <li>
                                    <a href="#" class="ks-menu-item ks-active">
                                        <span class="ks-text">
                                            Administrator
                                        </span>
                                        <span class="ks-badge badge badge-pill badge-pink">15</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="ks-menu-item">
                                        <span class="ks-text">
                                            Moderator
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="ks-menu-item">
                                        <span class="ks-text">
                                            Editor
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="ks-menu-item">
                                        <span class="ks-text">
                                            Client
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ks-navigation ks-browse ks-scrollable ks-roles-permissions-modules" data-auto-height>
                        <div class="ks-wrapper">
                            <div class="ks-roles-permissions-block-header">
                                Modules
                            </div>
                            <div class="ks-nav">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            Tasks

                                            <label class="ks-checkbox-switch ks-success">
                                                <input type="checkbox" value="1">
                                                <span class="ks-wrapper"></span>
                                                <span class="ks-indicator"></span>
                                                <span class="ks-on">On</span>
                                                <span class="ks-off">Off</span>
                                            </label>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            Blog

                                            <label class="ks-checkbox-switch ks-success">
                                                <input type="checkbox" value="1">
                                                <span class="ks-wrapper"></span>
                                                <span class="ks-indicator"></span>
                                                <span class="ks-on">On</span>
                                                <span class="ks-off">Off</span>
                                            </label>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            Calendar

                                            <label class="ks-checkbox-switch ks-success">
                                                <input type="checkbox" value="1">
                                                <span class="ks-wrapper"></span>
                                                <span class="ks-indicator"></span>
                                                <span class="ks-on">On</span>
                                                <span class="ks-off">Off</span>
                                            </label>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            Tickets

                                            <label class="ks-checkbox-switch ks-success">
                                                <input type="checkbox" value="1">
                                                <span class="ks-wrapper"></span>
                                                <span class="ks-indicator"></span>
                                                <span class="ks-on">On</span>
                                                <span class="ks-off">Off</span>
                                            </label>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            Files

                                            <label class="ks-checkbox-switch ks-success">
                                                <input type="checkbox" value="1">
                                                <span class="ks-wrapper"></span>
                                                <span class="ks-indicator"></span>
                                                <span class="ks-on">On</span>
                                                <span class="ks-off">Off</span>
                                            </label>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            Chat

                                            <label class="ks-checkbox-switch ks-success">
                                                <input type="checkbox" value="1">
                                                <span class="ks-wrapper"></span>
                                                <span class="ks-indicator"></span>
                                                <span class="ks-on">On</span>
                                                <span class="ks-off">Off</span>
                                            </label>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dm-permissions-list">
                        <table class="table table-hover dm-permissions-list-table">
                            <thead>
                            <tr>
                                <th width="1">Permission</th>
                                <th>Read</th>
                                <th>Write</th>
                                <th>Create</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="dm-permissions-list-table-module-name">Statistics</td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input" checked="">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="dm-permissions-list-table-module-name">Content</td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input" checked="">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="dm-permissions-list-table-module-name">Statistics</td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input" checked="">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="dm-permissions-list-table-module-name">Statistics</td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input" checked="">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="dm-permissions-list-table-module-name">Statistics</td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input" checked="">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="dm-permissions-list-table-module-name">Statistics</td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input" checked="">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{asset('/admin')}}/assets/styles/apps/crm/roles-permissions.min.css">

    <script>
        (function ($) {
            $('.ks-checkbox-switch :checkbox').on('change', function (e) {
                var checkbox = $(this);

                $('.dm-permissions-list-table :checkbox').each(function () {
                    $(this).get(0).checked = checkbox.is(':checked');
                });

                return false;
            });
        })(jQuery);
    </script>

@endsection