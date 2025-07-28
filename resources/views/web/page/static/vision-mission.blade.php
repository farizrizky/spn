@extends('web.template.web')
@section('content')
    {!! $partial_title !!}
    <section class="about-area py-120">
        <div class="container">
            <div class="row gx-xl-5 align-items-center">
                <div class="col-lg-12 mt-4 wow fadeInRight" data-wow-delay=".2s">
                    <div class="about-images">
                        <img src="{{ asset('assets/web/images/combined-landscape.jpg') }}" alt="about">
                    </div>
                </div>
                <div class="col-lg-12 mt-4 wow fadeInRight" data-wow-delay=".2s">
                    <div class="about-content">
                        <div class="section-top">
                            <h4 class="title mt-10 text-center"><span>Moto</span></h4>
                        </div>

                        <h4 class="mt-10 text-center"> Profesional, Cepat, Aman, dan Kompetitif</h4>
                        <i><center>Professional, Fast, Safe, and Competitive</center></i>
                    </div>

                    <div class="about-content mt-50">
                        <div class="section-top">
                            <h4 class="title mt-10 text-center"><span>Visi</span></h4>
                        </div>

                        <h5 class="mt-10 text-center">
                           Menjadi perusahaan penyedia pelumas yang unggul, berwawasan, dan bereputasi baik
                        </h5>
                        <i><center>To become a superior, insightful, and reputable lubricants agent company</center></i>
                    </div>

                    <div class="about-content mt-50">
                        <div class="section-top">
                            <h4 class="title mt-10 text-center"><span>Misi</span></h4>
                        </div>

                        <h5 class="text-center">
                            Menyediakan produk yang lebih kompetitif dan terjamin dengan pengiriman tepat waktu dan dilengkapi dengan sistem yang dikelola dengan baik dan kontrol kualitas yang baik
                        </h5>
                        <i><center>To provide more competitive and guaranteed products with on-time delivery and equipped with well-managed systems and good quality control</center></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
