<div class="menu-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-6">
                <div class="logo-area">
                    <a href=""><img src="{{ asset('assets/web/images/white-logo-text.png') }}" style="width:100px;" alt="logo"></a>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                <nav>
                    <ul class="main-menu">
                        <li><a href="{{ route('web.home') }}">Beranda</a></li>
                        <li class="has-submenu"><a href="#">Tentang Kami</a>
                            <ul class="submenu">
                                <li><a href="{{ route('web.profile') }}">Profil</a></li>
                                <li><a href="{{ route('web.vision-mission') }}">Visi Misi</a></li>
                                <li><a href="{{ route('web.bussiness-partner') }}">Mitra Bisnis</a></li>
                                <li><a href="{{ route('web.award') }}">Penghargaan</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('web.product-type') }}">Produk</a>
                            <ul class="submenu">
                                @foreach(DataHelper::getType() as $t)
                                    <li><a href="{{ route('web.product', ['type' => $t['slug']]) }}">{{ $t['name'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('web.service') }}">Layanan</a></li>
                        <li><a class="has-submenu" href="{{ route('web.blog') }}">Informasi</a>
                            <ul class="submenu">
                                @foreach(DataHelper::getBlogCategory() as $bc)
                                    <li><a href="{{ route('web.blog', ['category' => $bc->slug]) }}">{{ $bc->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('web.contact') }}">Kontak</a> </li>
                    </ul>
                </nav>
            </div>

            <div class="col-xl-2 col-lg-3 col-6">
                <div class="nav-right-content">
                <img src="{{ asset('assets/web/images/repsol-white.png') }}" style="width:150px;" alt="search" class="icon">
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-menu"></div>
</div>
