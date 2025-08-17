

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
            @canany(['Produk.Lihat Produk', 'Produk.Kelola Produk', 'Kategori Produk.Lihat Kategori Produk', 'Kategori Produk.Kelola Kategori Produk'])
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Produk</h4>
            </li>
            @endcanany
            @canany(['Produk.Lihat Produk', 'Produk.Kelola Produk'])
            <li class="nav-item {{ request()->routeIs('cms.product.*') ? 'active' : '' }}">
                <a href="{{ route('cms.product.index') }}">
                    <i class="fas fa-oil-can"></i>
                    <p>Produk</p>
                </a>
            </li>
            @endcanany
            @canany(['Kategori Produk.Lihat Kategori Produk', 'Kategori Produk.Kelola Kategori Produk'])
            <li class="nav-item {{ request()->routeIs('cms.product-category.*') ? 'active' : '' }}">
                <a href="{{ route('cms.type.index') }}">
                    <i class="fas fa-th"></i>
                    <p>Kategori Produk</p>
                </a>
            </li>
            @endcanany
            @canany(['Blog.Lihat Blog', 'Blog.Kelola Blog', 'Kategori Blog.Lihat Kategori Blog', 'Kategori Blog.Kelola Kategori Blog', 'Tag.Lihat Tag', 'Tag.Kelola Tag'])
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Blog</h4>
            </li>
            @endcanany
            @canany(['Blog.Lihat Blog', 'Blog.Kelola Blog'])
            <li class="nav-item {{ request()->routeIs('cms.blog.*') ? 'active' : '' }}">
                <a href="{{ route('cms.blog.index') }}">
                    	<i class="fas fa-newspaper"></i>
                    <p>Blog</p>
                </a>
            </li>
            @endcanany
            @canany(['Kategori Blog.Lihat Kategori Blog', 'Kategori Blog.Kelola Kategori Blog'])
            <li class="nav-item {{ request()->routeIs('cms.blog-category.*') ? 'active' : '' }}">
                <a href="{{ route('cms.blog-category.index') }}">
                    <i class="fas fa-th"></i>
                    <p>Kategori Blog</p>
                </a>
            </li>
            @endcanany
            @canany(['Tag.Lihat Tag', 'Tag.Kelola Tag'])
            <li class="nav-item {{ request()->routeIs('cms.tag.*') ? 'active' : '' }}">
                <a href="{{ route('cms.tag.index') }}">
                    <i class="fas fa-tags"></i>
                    <p>Tag</p>
                </a>
            </li>
            @endcanany

            @canany(['Form Kontak.Lihat Form Kontak', 'Form Kontak.Kelola Form Kontak', 'Data Kontak.Lihat Data Kontak', 'Data Kontak.Kelola Data Kontak'])
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Kontak</h4>
            </li>
            @endcanany
            @canany(['Form Kontak.Lihat Form Kontak', 'Form Kontak.Kelola Form Kontak'])
            <li class="nav-item {{ request()->routeIs('cms.contact-form.*') ? 'active' : '' }}">
                <a href="{{ route('cms.contact-form.index') }}">
                    <i class="fas fa-envelope"></i>
                    <p>Form Kontak</p>
                </a>
            </li>
            @endcanany
            @canany(['Data Kontak.Lihat Data Kontak', 'Data Kontak.Kelola Data Kontak'])
            <li class="nav-item {{ request()->routeIs('cms.contact-data.*') ? 'active' : '' }}">
                <a href="{{ route('cms.contact-data.index') }}">
                    <i class="fas fa-address-book"></i>
                    <p>Data Kontak</p>
                </a>
            </li>
            @endcanany
            @canany(['Client.Lihat Client', 'Client.Kelola Client', 'Testimonial.Lihat Testimonial', 'Testimonial.Kelola Testimonial'])
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Client & Testimonial</h4>
            </li>
            @endcanany
            @canany(['Client.Lihat Client', 'Client.Kelola Client'])
            <li class="nav-item {{ request()->routeIs('cms.client.*') ? 'active' : '' }}">
                <a href="{{ route('cms.client.index') }}">
                    <i class="fas fa-user"></i>
                    <p>Client</p>
                </a>
            </li>
            @endcanany
            @canany(['Testimonial.Lihat Testimonial', 'Testimonial.Kelola Testimonial'])
            <li class="nav-item {{ request()->routeIs('cms.testimonial.*') ? 'active' : '' }}">
                <a href="{{ route('cms.testimonial.index') }}">
                    <i class="fas fa-comment-dots"></i>
                    <p>Testimonial</p>
                </a>
            </li>
            @endcanany
            @canany(['Website Cover.Lihat Website Cover', 'Website Cover.Kelola Website Cover', 'Website Header.Lihat Website Header', 'Website Header.Kelola Website Header', 'Halaman Statis.Lihat Halaman Statis', 'Halaman Statis.Kelola Halaman Statis'])
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Pengaturan Website</h4>
            </li>
            @endcanany
            @canany(['Website Cover.Lihat Website Cover', 'Website Cover.Kelola Website Cover'])
            <li class="nav-item {{ request()->routeIs('cms.website-cover.*') ? 'active' : '' }}">
                <a href="{{ route('cms.website-cover.index') }}">
                    <i class="fas fa-images"></i>
                    <p>Website Cover</p>
                </a>
            </li>
            @endcanany
            @canany(['Website Header.Lihat Website Header', 'Website Header.Kelola Website Header'])
            <li class="nav-item {{ request()->routeIs('cms.website-header.*') ? 'active' : '' }}">
                <a href="{{ route('cms.website-header.index') }}">
                    <i class="fas fa-image"></i>
                    <p>Website Header</p>
                </a>
            </li>
            @endcanany
            @canany(['Halaman Statis.Lihat Halaman Statis', 'Halaman Statis.Kelola Halaman Statis'])
            <li class="nav-item {{ request()->routeIs('cms.static.*') ? 'active' : '' }}">
                <a href="{{ route('cms.static.index') }}">
                    <i class="fas fa-link"></i>
                    <p>Halaman Statis</p>
                </a>
            </li>
            @endcanany
            @canany(['File.Lihat File', 'File.Kelola File', 'Visitor Log.Lihat Visitor Log'])
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Utilitas</h4>
            </li>
            @endcanany
            @canany(['File.Lihat File', 'File.Kelola File'])
            <li class="nav-item {{ request()->routeIs('cms.file.*') ? 'active' : '' }}">
                <a href="{{ route('cms.file') }}">
                    <i class="fas fa-folder"></i>
                    <p>File</p>
                </a>
            </li>
            @endcanany
            @canany(['Visitor Log.Lihat Visitor Log', 'Visitor Log.Kelola Visitor Log'])
            <li class="nav-item {{ request()->routeIs('cms.visitor-log.*') ? 'active' : '' }}">
                <a href="{{ route('cms.visitor-log.index') }}">
                    <i class="fas fa-user"></i>
                    <p>Visitor Log</p>
                </a>
            </li>
            @endcanany
            @canany(['User.Lihat User', 'User.Kelola User', 'Role.Lihat Role', 'Role.Kelola Role', 'Permission.Lihat Permission', 'Permission.Kelola Permission'])
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">User</h4>
            </li>
            @endcanany
            @canany(['User.Lihat User', 'User.Kelola User'])
            <li class="nav-item {{ request()->routeIs('cms.user.*') ? 'active' : '' }}">
                <a href="{{ route('cms.user.index') }}">
                    <i class="fas fa-users"></i>
                    <p>User</p>
                </a>
            </li>
            @endcanany
            @canany(['Role.Lihat Role', 'Role.Kelola Role'])
            <li class="nav-item {{ request()->routeIs('cms.role.*') ? 'active' : '' }}">
                <a href="{{ route('cms.role.index') }}">
                    <i class="fas fa-user-tag"></i>
                    <p>Role</p>
                </a>
            </li>
            @endcanany
            @canany(['Permission.Lihat Permission', 'Permission.Kelola Permission'])
            <li class="nav-item {{ request()->routeIs('cms.permission.*') ? 'active' : '' }}">
                <a href="{{ route('cms.permission.index') }}">
                    <i class="fas fa-user-shield"></i>
                    <p>Permission</p>
                </a>
            </li>
            @endcanany
        </ul>
    </div>
</div>