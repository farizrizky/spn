<style>
    /* Default (desktop) gap pakai bawaan bootstrap */
.row.about-row {
  --bs-gutter-x: 1.5rem; /* default 24px */
  --bs-gutter-y: 1.5rem;
}

/* HP: jarak hanya 2px */
@media (max-width: 767.98px) {
  .row.about-row {
    --bs-gutter-x: 2px;
    --bs-gutter-y: 10px;
  }
}

.about-item {
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 100%;   /* biar selalu penuh */
  border-radius: 10px;
}

</style>
<section class="about-area py-120">
    <div class="container">
        <div class="row gx-xl-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                <div class="about-images">
                    <img src="{{ asset('assets/web/images/he4.jpg') }}" alt="about" style="border-radius: 10px;max-height: 600px; object-fit: cover;">
                </div>
                 <div class="row mt-4 pt-2 pb-4">
                    <div class="col-6 d-flex flex-column align-items-center counter-item">
                        <div class="counter-number d-flex">
                            <h3 class="counter">2.000</h3>
                            <h3>+</h3>
                           
                        </div>
                        <p class="text-center">Drum Terjual<br> ke berbagai perusahaan</p>
                    </div>
                    <div class="col-6 d-flex flex-column align-items-center counter-item border-start">
                        <div class="counter-number d-flex">
                            <h3 class="counter">3</h3>
                        </div>
                        <p class="text-center">Lokasi Distribusi <br>(Bengkulu, Jambi, Batam)</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInRight" data-wow-delay=".2s">
                <div class="about-content">
                    <div class="section-top">
                        <span class="sub-title">Tentang Kami</span> 
                        <h3 class="title mt-10"><span>PT. Sindo Prima Niaga</span></h3>
                        <h4 class="mt-20">
                            <q>Professional, Fast, Safe, and Competitive</q>
                        </h4>
                    </div>
                    <p class="mt-20">
                        Kami adalah perusahaan agen pelumas kendaraan, alat berat, dan peralatan mesin berat lainnya yang berkantor pusat di Jakarta. Perusahaan kami berkembang dan terus bergerak maju menjadi penyedia pelumas komersial unggul yang senantiasa memenuhi kebutuhan pelanggannya, terutama untuk segmen manufaktur, pertambangan, komersial, perkebunan, transportasi, konstruksi, juga kelautan dan perikanan. <br><br>
                    </p>
                    <div class="about-items mt-10">
                        <div class="row about-row">
                            <div class="col-12 col-md-6 d-flex align-items-stretch">
                                <div class="about-item h-100 w-100 shadow-sm rounded-5 p-3">
                                    <h6 class="title fw-bold">Ketersediaan Lengkap</h6>
                                    <div class="d-flex align-items-center gap-3 mt-2">
                                        <img src="{{ asset('assets/web/images/crude.png') }}" alt="icon">
                                        <span>Menyediakan pelumas sesuai kebutuhan anda</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 d-flex align-items-stretch">
                                <div class="about-item h-100 w-100 shadow-sm rounded-5 p-3">
                                    <h6 class="title fw-bold">Pengiriman Tepat Waktu</h6>
                                    <div class="d-flex align-items-center gap-3 mt-2">
                                        <img src="{{ asset('assets/web/images/tanker-truck.png') }}" alt="icon">
                                        <span>Memastikan pendistribusian tepat waktu</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 d-flex align-items-stretch">
                                <div class="about-item h-100 w-100 shadow-sm rounded-5 p-3">
                                    <h6 class="title fw-bold">Bantuan Teknis</h6>
                                    <div class="d-flex align-items-center gap-3 mt-2">
                                        <img src="{{ asset('assets/web/images/mechanic.png') }}" alt="icon">
                                        <span>Memberikan dukungan teknis terkait produk</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 d-flex align-items-stretch">
                                <div class="about-item h-100 w-100 shadow-sm rounded-5 p-3">
                                    <h6 class="title fw-bold">Layanan Di Tempat</h6>
                                    <div class="d-flex align-items-center gap-3 mt-2">
                                        <img src="{{ asset('assets/web/images/professional-services.png') }}" alt="icon">
                                        <span>Memberikan layanan di tempat sesuai kebutuhan</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="button-group mt-30">
                            <a href="{{ route('web.profile') }}" class="primary-btn"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>

                            <div class="phone-text">
                                <img src="{{ asset('assets/web/images/icon-5.png') }}" alt="icon">
                                <div class="text-part">
                                    <span>Butuh Bantuan?</span>
                                    <h5 class="title"><a href="{{ DataHelper::getContactData('telepon')->url ?? '' }}">{{ DataHelper::getContactData('telepon')->value ?? '' }}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>