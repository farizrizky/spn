<footer class="footer-area" data-background="{{ asset('assets/web/images/pengisian.png') }}">
    <!-- footer info  -->
    <div class="footer-info pt-40 pb-10">
        <div class="container">
            <div class="info-items">
                <div class="single-item d-flex align-items-center gap-3">
                    <div class="icon">
                        <span><i class="ri-phone-fill"></i></span>
                    </div>
                    <div class="content">
                        <span>Nomor Layanan</span>
                        <h5 class="title"><a href="#">{{ DataHelper::getContactData('telepon')->value }}</a></h5>
                    </div>
                </div>
                <div class="single-item d-flex align-items-center gap-3">
                    <div class="icon">
                        <span><i class="ri-mail-fill"></i></span>
                    </div>
                    <div class="content">
                        <span>Email</span>
                        <h5 class="title"><a href="#">{{ DataHelper::getContactData('email')->value }}</a></h5>
                    </div>
                </div>
                <div class="single-item d-flex align-items-center gap-3">
                    <div class="icon">
                        <span><i class="ri-map-pin-2-fill"></i></span>
                    </div>
                    <div class="content">
                        <span>Alamat</span>
                        <h5 class="title"><a href="#">{{ DataHelper::getContactData('alamat')->value }}</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-content" style="background-color: rgb(29, 38, 47, 0.96);">
        <!-- widget area -->
        <div class="widget-area pt-80 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="index.html"><img src="{{ asset('assets/web/images/white-logo-text.png') }}" alt="logo"></a>
                            </div>
                            <strong class="mt-50">PT. Sindo Prima Niaga</strong>
                            <p>
                                {{ DataHelper::getContactData('alamat')->value }} <br>Telepon: {{ DataHelper::getContactData('telepon')->value }}
                            </p>
                            
                            <div class="footer-social mt-20">
                                <h6 class="title">follow us</h6>
                                <ul class="mt-10">
                                    <li><a href="{{ DataHelper::getContactData('linkedin')->url }}"><i class="ri-linkedin-line"></i></a></li>
                                    <li><a href="{{ DataHelper::getContactData('instagram')->url }}"><i class="ri-instagram-line"></i></a></li>
                                    <li><a href="{{ DataHelper::getContactData('tiktok')->url }}"><i class="ri-tiktok-fill"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 offset-xl-1 col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5 class="title">Produk</h5>
                            </div>
                            <ul class="nav-links mt-30">
                                @foreach (DataHelper::getType() as $t)
                                    <li><a href="{{ $t->slug }}">{{ $t->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 offset-xl-1 col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5 class="title">PT. SPN</h5>
                            </div>
                            <ul class="nav-links mt-30">
                                <li><a href="">Tentang Kami</a></li>
                                <li><a href="">Visi Misi</a></li>
                                <li><a href="">Produk</a></li>
                                <li><a href="">Layanan</a></li>
                                <li><a href="">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-xl-2 offset-xl-1 col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5 class="title">Link</h5>
                            </div>
                            <ul class="nav-links mt-30">
                                <li><a href="https://lubricants.repsol.com/">Repsol Lubricants</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                
        </div>

        <!-- copyright area -->
        <div class="copyright-area py-30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="copyright-text text-center">
                            <span>Copyright &copy; <span id="date"></span> <strong>PT. Sindo Prima Niaga.</strong> All rights reserved.</span>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <ul class="footer-menu">
                            <li><a href="contact.html">Support</a></li>
                            <li><a href="#">Terms Of Services</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</footer>
