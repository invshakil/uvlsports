@extends('backend.index')

@section('module_navigation')


    <div class="ks-navbar-horizontal ks-info" >
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="index.html">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Layouts</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item active" href="../horizontal_navbar-primary/index.html" target="_blank">Horizontal</a>
                    <a class="dropdown-item" href="../horizontal_navbar_iconbar-primary/index.html" target="_blank">Horizontal Iconbar</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="projects-kanban-board.html">
                    <span class="ks-text">Projects</span>
                </a>
            </li>

        </ul>
    </div>


@endsection