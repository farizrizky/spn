<div>
@extends('web.template.web')

@section('content')
    {!! $partial_title !!}
    <!-- service details starts -->
    <section class="service-details pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <div class="about-images mb-30">
                        <img src="{{ asset('assets/web/images/truckdistribution.png') }}" alt="about">
                    </div>
                    <div class="service-content">
                        <h4 class="title">Layanan Lube Truck Distribution</h4>
                        <p class="mt-20">
                            Lube truck kendaraan khusus kami dilengkapi dengan tangki penyimpanan berbagai jenis oli (mesin, hidrolik, transmisi), gemuk, cairan pendingin. Truk ini juga dilengkapi dengan pompa, selang, meteran, dan peralatan filtrasi untuk melakukan pengisian ulang atau penggantian oli di lokasi pelanggan.
                        </p>

                        <strong class="mt-20">Keunggulan Lube Truck Distribution:</strong>
                        <p class="mt-10">
                            <strong>Mobilitas tinggi</strong>, Mampu menjangkau lokasi terpencil atau area kerja yang sulit diakses, seperti pertambangan, perkebunan, proyek konstruksi, atau lokasi pabrik yang luas. serta dapat menyelesaikan scadeule dengan cepat. 
                        </p>
                        <p class="mt-10">
                            <strong>Efisiensi waktu</strong>, Mengurangi kebutuhan peralatan untuk datang ke bengkel atau service center, sehingga meminimalkan downtime operasional.
                        </p>
                        <p class="mt-10">
                            <strong>Fleksibilitas</strong>, Dapat melayani berbagai jenis alat berat dan mesin di lokasi yang berbeda.
                        </p>
                        <p class="mt-10">
                           Kehadiran lubetruck sangat vital di berbagai industri, terutama yang melibatkan alat berat dan operasional di lokasi terpencil atau sulit dijangkau. Beberapa sektor yang paling diuntungkan dengan keberadaan lubetruck khususnya untuk pertambangan, perawatan rutin alat berat seperti ekskavator, dump truck raksasa, dan buldoser tanpa perlu menghentikan operasi dalam waktu lama atau memindahkannya ke bengkel. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
