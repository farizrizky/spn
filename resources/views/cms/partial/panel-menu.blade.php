

 <div class="sidebar-logo">
    <div class="logo-header" data-background-color="dark">
        <a href="/dashboard" class="logo">
            <img src="{{ asset('assets/cms/img/white-logo-text.png') }}" alt="navbar brand" class="navbar-brand" height="50">
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
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
       <ul class="nav nav-secondary">
            <li class="nav-item {{ request()->routeIs('cms.dashboard') ? 'active' : '' }}">
                <a href="{{ route('cms.dashboard') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Produk</h4>
            </li>
            <li class="nav-item {{ request()->routeIs('cms.product.*') ? 'active' : '' }}">
                <a href="{{ route('cms.product.index') }}">
                    <i class="fas fa-oil-can"></i>
                    <p>Produk</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('cms.product-category.*') ? 'active' : '' }}">
                <a href="{{ route('cms.type.index') }}">
                    <i class="fas fa-th"></i>
                    <p>Kategori Produk</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('cms.quality-level.index') }}">
                    <i class="fas fa-star"></i>
                    <p>Level Kualitas Produk</p>
                </a>
            </li> --}}
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Blog</h4>
            </li>
            <li class="nav-item {{ request()->routeIs('cms.blog.*') ? 'active' : '' }}">
                <a href="{{ route('cms.blog.index') }}">
                    	<i class="fas fa-newspaper"></i>
                    <p>Blog</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('cms.blog-category.*') ? 'active' : '' }}">
                <a href="{{ route('cms.blog-category.index') }}">
                    <i class="fas fa-th"></i>
                    <p>Kategori Blog</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('cms.tag.*') ? 'active' : '' }}">
                <a href="{{ route('cms.tag.index') }}">
                    <i class="fas fa-tags"></i>
                    <p>Tag</p>
                </a>
            </li>
             <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Kontak</h4>
            </li>
            <li class="nav-item {{ request()->routeIs('cms.contact-form.*') ? 'active' : '' }}">
                <a href="{{ route('cms.contact-form.index') }}">
                    <i class="fas fa-envelope"></i>
                    <p>Form Kontak</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('cms.contact-data.*') ? 'active' : '' }}">
                <a href="{{ route('cms.contact-data.index') }}">
                    <i class="fas fa-address-book"></i>
                    <p>Data Kontak</p>
                </a>
            </li>
        </ul>
    </div>
</div>