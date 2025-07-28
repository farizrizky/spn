@extends('web.template.web')

@section('content')
    {!! $partial_title !!}
    <section class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="contact-info">
                        <h3 class="title">Diskusikan Bersama Kami</h3>
                        <p class="mt-20">
                            Kami siap membantu Anda dengan segala kebutuhan informasi terkait produk dan layanan kami. Jangan ragu untuk menghubungi kami melalui form di bawah ini atau melalui informasi kontak yang tersedia.
                        </p>
                        <div class="info-items mt-30">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="single-info d-flex align-items-center gap-3">
                                        <div class="info-icon">
                                            <span class="icon"><i class="ri-phone-fill"></i></span> 
                                        </div>
                                        <div class="info-text">
                                            <h5 class="title">Telepon</h5>
                                            <a href="#">(307) 555-0133</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-info d-flex align-items-center gap-3">
                                        <div class="info-icon">
                                            <span class="icon"><i class="ri-mail-fill"></i></span>
                                        </div>
                                        <div class="info-text">
                                            <h5 class="title">Email</h5>
                                            <a href="#">sales@spniaga.co.id</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-info d-flex align-items-center gap-3">
                                        <div class="info-icon">
                                            <span class="icon"><i class="ri-map-pin-2-fill"></i></span>
                                        </div>
                                        <div class="info-text">
                                            <h5 class="title">Alamat</h5>
                                            <a href="#">Rukan Cordoba Blok C No.18 LT.1 Pantai Indah, DKI Jakarta</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contact-social">
                            <ul>
                                <li><a href="https://www.linkedin.com/company/pt-spniaga/"><i class="ri-linkedin-line"></i></a></li>
                                <li><a href="https://www.instagram.com/spniaga_"><i class="ri-instagram-line"></i></a></li>
                                <li><a href="https://www.tiktok.com/@spniaga_"><i class="ri-linkedin-fill"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".2s">
                    <div class="form-part">
                        <h4 class="title">Biarkan Kami Membantu Anda</h4>
                        <div class="theme-form mt-40">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Nama Anda">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" placeholder="Email Anda">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="tel" placeholder="Nomor Telepon">
                                    </div>
                                    <div class="col-md-6">
                                        <select>
                                            <option value="">Pilih Topik</option>
                                            <option value="ca">Informasi Produk</option>
                                            <option value="au">Informasi Layanan</option>
                                            <option value="bd">Informasi Kemitraan</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" placeholder="Pertanyaan Anda"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn primary-bg"><span class="text">Kirim</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
