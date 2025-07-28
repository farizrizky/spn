@extends('web.template.web')

@section('content')
    {!! $partial_title !!}
    <section class="about-area py-120">
        <div class="container">
            <div class="row gx-xl-5 align-items-center">
                <div class="col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="about-images">
                        <img src="{{ asset('assets/web/images/award1.png') }}" alt="about" style="border-radius: 10px;">
                    </div>
                </div>

                <div class="col-lg-8 wow fadeInRight" data-wow-delay=".2s">
                    <div class="about-content">
                        <div class="section-top">
                            <span class="sub-title">(PLI Distributor Summit 2025 - Jogyakarta 2025)</span> 
                            <h3 class="title mt-10"><span>SPECIAL RECOGNITION GROWTH OF THE YEAR</span></h3>
                        </div>
                        <p class="mt-20">
                            Menerima penghargaan,Special Recognation Growth of the year, yang diselengarakan PLI Distributor Summit 2025 Sebagai perusahaan agen pelumas untuk industri kami selalu memberikan layanan terbaik untuk pelanggan kami. sesuai dengan moto kami “ Professional, Fast, Safe, and Competitive” Penghargaan ini merupakan bentuk keberhasilan PT. Sindo Prima Niaga Sebagai Agen Pelumas Industri
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-area py-60">
        <div class="container">
            <div class="row gx-xl-5 align-items-center">
                <div class="col-lg-8 wow fadeInRight" data-wow-delay=".2s">
                    <div class="about-content">
                        <div class="section-top">
                            <span class="sub-title">(PLI Distributor Summit 2025 - Jogyakarta 2025)</span> 
                            <h3 class="title mt-10"><span>BEST SUMATERA REGION OF THE YEAR</span></h3>
                        </div>
                        <p class="mt-20">
                           Menerima penghargaan, “Best Sumatera Region Of The Year”, menunjukan bahwa kami, merupakan Perusahaan yang serius dalam menjalankan kerja-sama dengan berbagai pihak. mampu menjadi yang terbaik untuk distributor lubricant industrial di sumatera. kami berkomitmen untuk terus tumbuh dan berkembang menjadi yang terbaik di level nasional & Internasional
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="about-images">
                        <img src="{{ asset('assets/web/images/award2.png') }}" alt="about" style="border-radius: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
