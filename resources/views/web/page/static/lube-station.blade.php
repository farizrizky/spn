@extends('web.template.web')

@section('content')
    {!! $partial_title !!}
    <!-- service details starts -->
    <section class="service-details pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <div class="about-images mb-30">
                        <img src="{{ asset('assets/web/images/lubestation.png') }}" alt="about">
                    </div>
                    <div class="service-content">
                        <h4 class="title">Layanan Lube Station Distribution</h4>
                        <p class="mt-20">
                            Lube station adalah salah satu fasilitas yang kami tawari, dirancang untuk penyimpanan, distribusi, dan manajemen pelumas dalam skala yang lebih besar. Lubestation yang kami rancang bersifat mobile, dapat berpindah-pindah sesuai dengan titik kepadatan unit di daerah pertambangan. Lube station dilengkapi dengan tangki penyimpanan berkapasitas besar, sistem pompa yang kuat, reel selang, dan sistem pengukuran yang akurat
                        </p>

                        <strong class="mt-20">Keunggulan Lube Station Distribution:</strong>
                        <p class="mt-10">
                            <strong>Mobilitas tinggi</strong>, Mampu menjangkau lokasi terpencil atau area kerja yang sulit diakses, seperti pertambangan, perkebunan, proyek konstruksi, atau lokasi pabrik yang luas.
                        </p>
                        <p class="mt-10">
                            <strong>Integrasi Sistem</strong>, Dapat diintegrasikan dengan sistem manajemen inventaris dan perawatan untuk pelacakan penggunaan oli yang lebih baik.
                        </p>
                        <p class="mt-10">
                            <strong>Kapasitas Besar</strong>, Mampu menyimpan volume oli yang sangat besar, ideal untuk operasi dengan konsumsi pelumas tinggi.
                        </p>
                        <p class="mt-10">
                           Sindo Prima Niaga Bernar-Benar akan berkomitmen untuk meningkatkan performa layanan distribusi, dengan Unit Distribusi Lube Station ini, merupakan pengembangan Sindo Prima Niaga dalam mendistribusikan oli untuk kebutuhan seluruh unit alat berat di pertambangan. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
