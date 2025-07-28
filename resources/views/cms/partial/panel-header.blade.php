<div class="main-header-logo">
    <div class="logo-header" data-background-color="dark">
    <a href="index.html" class="logo">
        <img src="{{ asset('assets/cms/img/white-logo-text.png') }}" alt="navbar brand" class="navbar-brand" height="20">
    </a>
    <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
        </button>
    </div>
        <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
        </button>
    </div>
</div>
<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <span class="profile-username">
                        <span class="op-7">Hi,</span>
                        <span class="fw-bold">{{ Auth::user()->name }}</span><br>
                        <small class="text-muted"></small>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <a class="dropdown-item" href="{{ route('cms.logout') }}">
                                <i class="fas fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>