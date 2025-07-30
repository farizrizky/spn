@extends('web.template.web')

@section('content')
<!-- hero area starts -->
{!! $partial_hero !!}
<!-- about area starts -->

    <section class="about-area py-120">
        <div class="container">
            <div class="row gx-xl-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="about-images">
                        <img src="{{ asset('assets/web/images/index2-bg.jpg') }}" alt="about" style="border-radius: 10px;">
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".2s">
                    <div class="about-content">
                        <div class="section-top">
                            <span class="sub-title">Tentang Kami</span> 
                            <h3 class="title mt-10"><span>PT. Sindo Prima Niaga</span></h3>
                        </div>
                        <p class="mt-20">
                            Kami adalah perusahaan agen pelumas kendaraan, alat berat, dan peralatan mesin berat lainnya yang berkantor pusat di Jakarta. Perusahaan kami berkembang dan terus bergerak maju menjadi penyedia pelumas komersial unggul yang senantiasa memenuhi kebutuhan pelanggannya, terutama untuk segmen manufaktur, pertambangan, komersial, perkebunan, transportasi, konstruksi, juga kelautan dan perikanan. <br><br>
                            Dikelola secara profesional dan berorientasi pada kepuasan pelanggan, PT Sindo Prima Niaga terus melakukan yang terbaik untuk mencapai tujuan akhir menjadi penyedia pelumas komersial terkemuka di Indonesia
                        </p>

                        <h4 class="mt-20">
                            <q>Professional, Fast, Safe, and Competitive</q>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- counter area starts -->
    <section class="counter-area pt-50 pb-90">
        <div class="container">
            <div class="top-part" style="background-color:#143F6B;">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="counter-content">
                            <h5 class="title">
                                <span class="text">Kami telah menjadi mitra terpercaya dalam penyediaan lubricant oil berkualitas.</span>
                            </h5>

                            <div class="row mt-30">
                                <div class="col-md-4 col-sm-6">
                                    <div class="single-counter">
                                        <div class="d-flex align-items-center gap-3">
                                            <img class="icon" src="{{ asset('assets/web/images/icon-16.png') }}" alt="icon">
                                            <div class="counter-number d-flex">
                                                <h3 class="counter">500</h3>
                                                <h3>+</h3>
                                            </div>
                                        </div>
                                        <span class="title mt-10">Customer</span>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <div class="single-counter">
                                        <div class="d-flex align-items-center gap-3">
                                            <img class="icon" src="{{ asset('assets/web/images/icon-16.png') }}" alt="icon">
                                            <div class="counter-number d-flex">
                                                <h3 class="counter">400</h3>
                                                <h3>+</h3>
                                            </div>
                                        </div>
                                        <span class="title mt-10">Lokasi Distribusi</span>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <div class="single-counter">
                                        <div class="d-flex align-items-center gap-3">
                                            <img class="icon" src="{{ asset('assets/web/images/icon-16.png') }}" alt="icon">
                                            <div class="counter-number d-flex">
                                                <h3 class="counter">100</h3>
                                                <h3>+</h3>
                                            </div>
                                        </div>
                                        <span class="title mt-10">Tahun Pengalaman</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="counter-image">
                            <img src="{{ asset('assets/web/images/ss3.png') }}" alt="counter">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <!-- feature area starts --> 
    <section class="feature-area pt-120 pb-100">
        <div class="container">
            <div class="top-content">
                <div class="row">
                    <div class="col-lg-9">
                        <span class="sub-title">Mitra Bisnis</span> 
                        <h2 class="title">Bermitra Bersama Kami</h2>
                        <p>PT. Sindo Prima Niaga sebagai distributor lubricant oil senantiasa membuka diri untuk bekerja sama dengan pihak manapun serta dapat turut ambil bagian dalam membantu penyediaan, pendistribusian untuk produk lubericant oli. Consigment project merupakan salah satu upaya dari kami dalam mendistribusikan oli, dengan profesional, cepat, dan terjamin.
                    </div>
                    <div class="col-lg-3">
                        <img class="img-fluid d-block d-sm-none" src="{{ asset('assets/web/images/white-logo.png') }}" style="width:0px;" alt="drum">
                        <img class="img-fluid d-none d-sm-block" src="{{ asset('assets/web/images/white-logo.png') }}" style="width:150px;" alt="drum">
                    </div>
                </div>
            </div>

            <div class="feature-items">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-feature">
                            <div class="icon-box white-bg mb-20">
                                <img src="{{ asset('assets/web/images/delivery-truck.png') }}" alt="icon" class="icon">
                            </div>
                            <h5 class="title">Efektifitas Pendistribusian</h5>
                            <p class="mt-10">Memastikan pendistribusian yang cepat kepada pelanggan.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-feature">
                            <div class="icon-box white-bg mb-20">
                                <img src="{{ asset('assets/web/images/checklist.png') }}" alt="icon" class="icon">
                            </div>
                            <h5 class="title">Ketersediaan Stok</h5>
                            <p class="mt-10">Memastikan persediaan produk Oli mecukupi kebutuhan pelanggan.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-feature">
                            <div class="icon-box white-bg mb-20">
                                <img src="{{ asset('assets/web/images/delivery-courier.png') }}" alt="icon" class="icon">
                            </div>
                            <h5 class="title">Pelayanan Prima</h5>
                            <p class="mt-10">Memberikan pelayanan yang responsif dan profesional kepada pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid px-0">
            <div class="partner-slider-wrapper">
                <div class="partner-slider mt-40">
                    <div class="single-slide d-flex align-items-center gap-3">
                        <img src="{{ asset('assets/web/images/cde-logo.png') }}" alt="icon" class="icon">
                        <span class="light-text">PT. CDE Coal</span>
                    </div>
                    <div class="single-slide d-flex align-items-center gap-3">
                        <img src="{{ asset('assets/web/images/ces-logo.png') }}" alt="icon" class="icon">
                        <span class="light-text">PT. CES Coal</span>
                    </div>
                    <div class="single-slide d-flex align-items-center gap-3">
                        <img src="{{ asset('assets/web/images/jyl-logo.png') }}" alt="icon" class="icon">
                        <span class="light-text">PT. JYL Indo Mining</span>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <!-- counter area starts -->
    <section class="counter-area pt-120 pb-90">
        <div class="container">
            <div class="section-top">
                <span class="sub-title">Layanan</span> 
                <h3 class="title mt-10">Layanan <span>Jasa Distribusi</span></h3>
                <p class="mt-10">
                    Kami berkomitement untuk selalu memberikan layanan terbaik untuk seluruh mitra bisnisnya. Oleh Karna itu kami juga menawarkan terkait layanan distribusi oli, dengan unit distribusi yang kami miliki, kemudahan dalam segala bentuk layanan distribusi pelumas
                </p>
            </div>

            <div class="bottom-part mt-30">
                <div class="row">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                        <div class="single-card dark-bg mb-30" data-background="{{ asset('assets/web/images/truckdistribution.png') }}">
                            <h5 class="title">Lube Truck Distribution</h5>
                            <p class="mt-100">Layanan distribusi oli menggunakan truck khusus yang memberikan mobilitas tinggi dalam pengiriman pelumas ke lokasi pelanggan.</p>
                            <a href="{{ route('web.lube-truck') }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                        <div class="single-card dark-bg mb-30" data-background="{{ asset('assets/web/images/lubestation.png') }}">
                            <h5 class="title">Lube Station</h5>
                            <p class="mt-100">Stasiun distribusi oli yang dirancang untuk memberikan kemudahan dalam pengisian dan penggantian pelumas di lokasi pelanggan.</p>
                            <a href="{{ route('web.lube-station') }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- service area starts -->
    {{-- <section class="service-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-top">
                        <span class="sub-title">Produk</span> 
                        <h3 class="title mt-10">Produk <span>yang Kami Sediakan</span></h3>
                    </div>
                </div>
            </div>
            <div class="service-slider mt-50">
                <div class="single-service single-card dark-bg" data-background="{{ asset('assets/web/images/heavy-equipment.jpg') }}">
                    <h5 class="title mb-100"><a href="{{ route('product.list', ['category' => 'pelumas-mesin-diesel']) }}" class="text-white">Pelumas Mesin Diesel</a></h5>
                    <a href="{{ route('product.list', ['category' => 'pelumas-mesin-diesel']) }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                </div>

                <div class="single-service single-card dark-bg" data-background="{{ asset('assets/web/images/gear.png') }}">
                    <h5 class="title mb-100"><a href="{{ route('product.list', ['category' => 'pelumas-gear-transmisi']) }}" class="text-white">Pelumas Gear & Transmisi</a></h5>
                    <a href="{{ route('product.list', ['category' => 'pelumas-gear-transmisi']) }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                </div>

                <div class="single-service single-card dark-bg" data-background="{{ asset('assets/web/images/hidraulik.png') }}">
                    <h5 class="title mb-100"><a href="{{ route('product.list', ['category' => 'pelumas-hidraulik']) }}" class="text-white">Pelumas Hidraulik</a></h5>
                    <a href="{{ route('product.list', ['category' => 'pelumas-hidraulik']) }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                </div>

                <div class="single-service single-card dark-bg" data-background="{{ asset('assets/web/images/compressor.png') }}">
                    <h5 class="title mb-100"><a href="{{ route('product.list', ['category' => 'pelumas-compressor']) }}" class="text-white">Pelumas Compressor</a></h5>
                    <a href="{{ route('product.list', ['category' => 'pelumas-compressor']) }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                </div>

                <div class="single-service single-card dark-bg" data-background="{{ asset('assets/web/images/heat-transfer.png') }}">
                    <h5 class="title mb-100"><a href="{{ route('product.list', ['category' => 'pelumas-heat-transfer']) }}" class="text-white">Pelumas Heat Transfer</a></h5>
                    <a href="{{ route('product.list', ['category' => 'pelumas-heat-transfer']) }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                </div>
                
            </div>
        </div>

        <div class="service-bg-card d-none d-sm-block" style="background-image: url('{{ asset('assets/web/images/coalloaded.png') }}');background-size: cover;"></div>
    </section> --}}

    <!-- testimonial area starts -->
    <section class="testimonial-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="review-part">
                        <div class="section-top">
                            <span class="sub-title">Testimoni</span>
                            <h3 class="title mt-10">Testimoni Customer</h3>

                            <div class="testimonial-slider mt-40">
                                <div class="single-testimonial">
                                    <div class="top-content d-flex align-items-center justify-content-between">
                                        <div class="left d-flex align-items-center gap-4">
                                            <img src="{{ asset('assets/web/images/testi_jyl.png') }}" alt="reviewer" class="reviewer">
                                            <div class="author-info">
                                                <h5 class="title">Faisal</h5>
                                                <span class="designation">Junio SPV. PT. JYL Indo Minning</span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <img src="{{ asset('assets/web/images/jyl-logo.png') }}" alt="icon" class="icon">
                                        </div>
                                    </div>
                                    <span class="divider"></span>
                                    <i class="fs-5">
                                        "PT. Sindo Prima Niaga telah banyak membantu kami dengan produk pelumas Repsol nya, untuk unit-unit kami yang maintenance. Yang membuat saya terkesan, PT. Sindo Prima Niaga mampu memberikan perhatian terhadap rekomendasi pelumas terbaiknya."
                                    </i>
                                </div>

                                <div class="single-testimonial">
                                    <div class="top-content d-flex align-items-center justify-content-between">
                                        <div class="left d-flex align-items-center gap-4">
                                            <img src="{{ asset('assets/web/images/testi_cde.png') }}" alt="reviewer" class="reviewer">
                                            <div class="author-info">
                                                <h5 class="title">Carlos</h5>
                                                <span class="designation">Foreman Mekanik PT. Cakrawala Dinamika Energi</span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <img src="{{ asset('assets/web/images/cde-logo.png') }}" alt="icon" class="icon">
                                        </div>
                                    </div>
                                    <span class="divider"></span>
                                    <i class="fs-5">
                                        "Kami telah percayakan PT. Sindo Prima Niaga, dalam kebutuhan peluman untuk operasional site kami. Kami mendapatkan hasil yang memuaskan dari layanan supply dan distribusi yang diberikan PT. Sindo Prima Niaga melalui unit distribusinya seperti Lube Truck Distribution dan Lube Station."
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".2s">
                    <div class="form-part">
                        <h4 class="title">Butuh Diskusi Lebih Lanjut?</h4>
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

    <!-- blog area starts -->
    <section class="blog-area py-120">
        <div class="container">
            <div class="section-top">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="section-top text-center">
                            <span class="sub-title">our blogs</span> 
                            <h3 class="title mt-10">Latest <span>Blogs</span> & News</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blog-posts mt-50">
                <div class="row">
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".2s">
                        <div class="single-blog">
                            <div class="blog-thumbnail">
                                <a href="blog-details.html"><img src="{{ asset('assets/web/images/heavy-equipment.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta mb-20">
                                    <li><a href="blog-details.html"><span class="icon"><i class="ri-calendar-line"></i></span> May 20, 2025</a></li>
                                    <li><a href="blog-details.html"><span class="icon"><i class="ri-user-line"></i></span> by admin</a></li>
                                </ul>

                                <h5 class="title"><a href="blog-details.html">Wherever You Go, We'll Take You There Ride with Confidence</a></h5>

                                <a href="blog-details.html" class="primary-btn mt-20"><span class="text">read more</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="single-blog">
                            <div class="blog-thumbnail">
                                <a href="blog-details.html"><img src="{{ asset('assets/web/images/heavy-equipment.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta mb-20">
                                    <li><a href="blog-details.html"><span class="icon"><i class="ri-calendar-line"></i></span> May 20, 2025</a></li>
                                    <li><a href="blog-details.html"><span class="icon"><i class="ri-user-line"></i></span> by admin</a></li>
                                </ul>

                                <h5 class="title"><a href="blog-details.html">eligible Transport Reliable Service Travel safe for with Ease</a></h5>

                                <a href="blog-details.html" class="primary-btn mt-20"><span class="text">read more</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".4s">
                        <div class="single-blog">
                            <div class="blog-thumbnail">
                                <a href="blog-details.html"><img src="{{ asset('assets/web/images/heavy-equipment.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta mb-20">
                                    <li><a href="blog-details.html"><span class="icon"><i class="ri-calendar-line"></i></span> May 20, 2025</a></li>
                                    <li><a href="blog-details.html"><span class="icon"><i class="ri-user-line"></i></span> by admin</a></li>
                                </ul>

                                <h5 class="title"><a href="blog-details.html">Speedy Wheels Transport Metro Motion CityLink Services</a></h5>

                                <a href="blog-details.html" class="primary-btn mt-20"><span class="text">read more</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blog-button text-center mt-20">
                <a href="blog.html" class="primary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
            </div>
        </div>
        
        @include('web.partial.cta')
    </section>
    
@endsection
