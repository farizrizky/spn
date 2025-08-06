@extends('web.template.web')

@section('content')
    {!! $partial_title !!}

    <!-- service details starts -->
    <section class="service-details pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-content">
                        <h4 class="title">Layanan Jasa Distribusi</h4>
                        <p class="mt-20">
                            PT. Sindo Prima Niaga akan berkomitement untuk selalu memberikan layanan terbaik untuk seluruh mitra bisnisnya. Oleh Karna itu kami juga menawarkan terkait layanan distribusi oli, dengan unit distribusi yang kami miliki, kemudahan dalam segala bentuk layanan distribusi pelumas. Layanan distribusi oli melalui lube truck dan lube station adalah solusi vital bagi berbagai industri untuk memastikan ketersediaan pelumas yang efisien dan tepat waktu. Kedua layanan ini dirancang untuk meminimalkan downtime peralatan, mengoptimalkan kinerja mesin, dan memperpanjang umur komponen. Keuntungan utama dari layanan kami yaitu,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-area-3 pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".2s">
                    <div class="single-service">
                        <div class="d-flex justify-content-between align-items-center mb-30">
                            <div class="main-icon">
                                <img src="{{ asset('assets/web/images/piston.png') }}" alt="icon">
                            </div>
                            <span class="number">01</span>
                        </div>
                        <h5 class="title"><a href="service-details.html">Manajemen Pelumas Terintegrasi</a></h5>
                        <p class="mt-10">Mengelola pembelian, penggunaan, dan pemantauan pelumas dalam satu platform terpadu.</p>
                    </div>                    
                </div>

                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="single-service">
                        <div class="d-flex justify-content-between align-items-center mb-30">
                            <div class="main-icon">
                                <img src="{{ asset('assets/web/images/analytics.png') }}" alt="icon">
                            </div>
                            <span class="number">02</span>
                        </div>
                        <h5 class="title"><a href="service-details.html">Analitik & Pelaporan Data</a></h5>
                        <p class="mt-10">Menyediakan laporan dan analisis berbasis data untuk mendukungpengambilan Keputusan yang cepat</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".4s">
                    <div class="single-service">
                        <div class="d-flex justify-content-between align-items-center mb-30">
                            <div class="main-icon">
                                <img src="{{ asset('assets/web/images/clock.png') }}" alt="icon">
                            </div>
                            <span class="number">03</span>
                        </div>
                        <h5 class="title"><a href="service-details.html">Pemantauan Real Time</a></h5>
                        <p class="mt-10">Melakukan pemantauan kondisi pelumas dan distribusinya secar langsung dan akurat</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="single-service">
                        <div class="d-flex justify-content-between align-items-center mb-30">
                            <div class="main-icon">
                                <img src="{{ asset('assets/web/images/integration.png') }}" alt="icon">
                            </div>
                            <span class="number">04</span>
                        </div>
                        <h5 class="title"><a href="service-details.html">Efisiensi Operasional</a></h5>
                        <p class="mt-10">Menyederhanakan proses pengadaan dan distribusi Membantu Perusahaan menjaga kelangsungan operasional jangka Panjang secara efisien dan berkelanjutan</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".7s">
                    <div class="single-service">
                        <div class="d-flex justify-content-between align-items-center mb-30">
                            <div class="main-icon">
                                <img src="{{ asset('assets/web/images/quality-control.png') }}" alt="icon">
                            </div>
                            <span class="number">05</span>
                        </div>
                        <h5 class="title"><a href="service-details.html">Kontrol Penuh</a></h5>
                        <p class="mt-10">Kontrol penuh atas stock untuk mencegah kelebihan atau kekurangan stock. Serta meminimalisir terjadinya, stok lebih dan stok kurang. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-area pt-20 pb-90">
        <div class="container">
            <div class="section-top">
                <p class="mt-10">
                    Kami menyediakan layanan distribusi oli melalui lube truck dan lube station yang menjadi solusi vital bagi berbagai industri untuk memastikan ketersediaan pelumas yang efisien dan tepat waktu. Kedua layanan ini dirancang untuk meminimalkan downtime peralatan, mengoptimalkan kinerja mesin, dan memperpanjang umur komponen.
                </p>
            </div>

            <div class="bottom-part mt-30">
                <div class="row">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                        <div class="single-card dark-bg mb-30" data-background="{{ asset('assets/web/images/truckdistribution.png') }}">
                            <h5 class="title">Lube Truck Distribution</h5>
                            <p class="mt-20">Layanan distribusi oli menggunakan truck khusus yang memberikan mobilitas tinggi dalam pengiriman pelumas ke lokasi pelanggan.</p>
                            <a wire:navigate href="{{ route('web.lube-truck') }}" class="primary-btn secondary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                        <div class="single-card dark-bg mb-30" data-background="{{ asset('assets/web/images/lubestation.png') }}">
                            <h5 class="title">Lube Station</h5>
                            <p class="mt-20">Stasiun distribusi oli yang dirancang untuk memberikan kemudahan dalam pengisian dan penggantian pelumas di lokasi pelanggan.</p>
                            <a wire:navigate href="{{ route('web.lube-station') }}" class="primary-btn secondary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
