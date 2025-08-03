<style>
    .service-card {
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: 0.3s ease;
}

.service-card:hover {
    transform: translateY(-5px);
}

.card-top {
    height: 200px;
    background-size: cover;
    background-position: center;
    width: 100%;
}

.card-bottom {
    padding: 20px;
    flex: 1;
}

.card-bottom h5.title {
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.swiper-pagination {
    margin-top: 30px !important;
    position: relative;
    z-index: 1;
}

.swiper-pagination-bullet {
    background-color: #E8630A; /* Warna orange */
    opacity: 0.5;
}
</style>

<section class="counter-area pt-120 pb-90">
    <div class="container">
        <div class="section-top text-center">
            <span class="sub-title">Layanan</span>
            <h3 class="title mt-10">Layanan <span>Yang Kami Sediakan</span></h3>
            <p class="mt-10">
                Kami berkomitement untuk selalu memberikan layanan terbaik untuk seluruh mitra bisnisnya. Layanan yang kami sediakan meliputi consignment project, distribusi oli melalui Lube Truck dan Lube Station, serta berbagai layanan lainnya yang mendukung kebutuhan industri Anda.
            </p>
        </div>

        <div class="swiper myServiceSwiper mt-50">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="service-card">
                        <div class="card-top" style="background-image: url('{{ asset('assets/web/images/lubestation.png') }}');"></div>
                        <div class="card-bottom">
                            <h5 class="title">Lube Station</h5>
                            <p>Stasiun distribusi oli yang dirancang untuk kemudahan pengisian dan penggantian pelumas di lokasi pelanggan.</p>
                            <a href="{{ route('web.lube-station') }}" class="secondary-btn primary-bg mt-2">
                                <span class="text">Selengkapnya</span>
                                <span class="icon"><i class="ri-arrow-right-double-line"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="service-card">
                        <div class="card-top" style="background-image: url('{{ asset('assets/web/images/truckdistribution.png') }}');"></div>
                        <div class="card-bottom">
                            <h5 class="title">Lube Truck Distribution</h5>
                            <p>Layanan distribusi oli menggunakan truk khusus yang memberikan mobilitas tinggi dalam pengiriman pelumas ke lokasi pelanggan.</p>
                            <a href="{{ route('web.lube-truck') }}" class="secondary-btn primary-bg mt-2">
                                <span class="text">Selengkapnya</span>
                                <span class="icon"><i class="ri-arrow-right-double-line"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="service-card">
                        <div class="card-top" style="background-image: url('{{ asset('assets/web/images/lubestation.png') }}');"></div>
                        <div class="card-bottom">
                            <h5 class="title">Lube Station</h5>
                            <p>Stasiun distribusi oli yang dirancang untuk kemudahan pengisian dan penggantian pelumas di lokasi pelanggan.</p>
                            <a href="{{ route('web.lube-station') }}" class="secondary-btn primary-bg mt-2">
                                <span class="text">Selengkapnya</span>
                                <span class="icon"><i class="ri-arrow-right-double-line"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="service-card">
                        <div class="card-top" style="background-image: url('{{ asset('assets/web/images/lubestation.png') }}');"></div>
                        <div class="card-bottom">
                            <h5 class="title">Lube Station</h5>
                            <p>Stasiun distribusi oli yang dirancang untuk kemudahan pengisian dan penggantian pelumas di lokasi pelanggan.</p>
                            <a href="{{ route('web.lube-station') }}" class="secondary-btn primary-bg mt-2">
                                <span class="text">Selengkapnya</span>
                                <span class="icon"><i class="ri-arrow-right-double-line"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Pagination jika ingin -->
            <div class="swiper-pagination mt-5"></div>
        </div>
    </div>
</section>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".myServiceSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: { slidesPerView: 2 },
            992: { slidesPerView: 3 },
        },
         autoplay: {
            delay: 3000, // jeda 3 detik
            disableOnInteraction: false, // tetap jalan meskipun diklik/geser
        },
        loop: true
    });
</script>
