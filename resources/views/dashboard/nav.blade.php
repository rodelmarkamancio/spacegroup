<nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('dashboard') }}">Training</a>
    <div class="collapse navbar-collapse" id="navbarExample">
        <ul class="sidebar-nav navbar-nav">
            <li class="nav-item {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('menu') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('menu') }}"><i class="fa fa-fw fa-navicon"></i> Menu</a>
            </li>
            @if(Auth::check() && Auth::user()->isRole('admin'))
            <li class="nav-item {{ Route::currentRouteNamed('list_posts') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('list_posts') }}"><i class="fa fa-fw fa-users"></i> Users</a>
            </li>
            @endif
            <li class="nav-item {{ Route::currentRouteNamed('posts') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('posts') }}"><i class="fa fa-fw fa-edit"></i> Posts</a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('posts_cat') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('posts_cat') }}"><i class="fa fa-fw fa-list"></i> Posts Categories</a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('pages') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pages') }}"><i class="fa fa-fw fa-sticky-note-o"></i> Pages</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="nav-link mr-lg-2">Hi @if (Auth::check()){{ Auth::user()->name }} @endif</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i> <span class="hidden-lg-up">Messages <span class="badge badge-pill badge-primary">12 New</span></span>
                    <span class="new-indicator text-primary hidden-md-down"><i class="fa fa-fw fa-circle"></i><span class="number">12</span></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">New Messages:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>David Miller</strong> <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>Jane Smith</strong> <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>John Doe</strong> <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">
                        View all messages
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i> <span class="hidden-lg-up">Alerts <span class="badge badge-pill badge-warning">6 New</span></span>
                    <span class="new-indicator text-warning hidden-md-down"><i class="fa fa-fw fa-circle"></i><span class="number">6</span></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                </span>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>
</nav>