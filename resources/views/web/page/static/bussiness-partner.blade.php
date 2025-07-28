@extends('web.template.web')

@section('content')
    {!! $partial_title !!}
    <!-- service details starts -->
    <section class="service-details pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-content">
                        <div class="service-thumbnail mb-30">
                            <img src="{{ asset('assets/web/images/truckdistribution.png') }}" alt="service">
                        </div>
                        <h3 class="title">Consigment Project</h3>
                        <p class="mt-20">
                            Sindo Prima Niaga sebagai distributor resmi oil Repsol senantiasa membuka diri untuk bekerja sama dengan pihak manapun serta turut andil bagian dalam membantu penyediaan, pendistribusian untuk kebutuhan oli Industri. Consigment project merupakan salah satu upaya dari kami dalam mendistribusikan oli, dengan profesional, cepat, dan terjamin.
                        </p>
                        <p class="mt-20">
                            Project Consignment Sindo Prima Niaga telah berjalan sejak 2023 di sektor pertambangan yang ada di Provinsi Bengkulu. Project Consignment merupakan salah satu komitment kami sebagai upaya dalam pendistribusian kebutuh lubericant oil dengan langsung & cepat. memberikan produk terbaik untuk unit-unit pertambangan , pelayanan langsung konsultasi terkait permasalahaan. Berikut ini adalah beberapa mitra bisnis kami yang telah bekerja sama dengan kami dalam project consignment.
                        </p>
                        <div class="row mt-30">
                            <div class="col-md-4 wow fadeIn" data-wow-delay=".2s">
                                <div class="single-box mb-30">
                                    <img src="{{ asset('assets/web/images/cde-logo.png') }}" alt="icon" class="icon">
                                    <img src="{{ asset('assets/web/images/cde-logo.png') }}" alt="icon" class="icon-fade">
                                    <h5 class="title">PT. Cakrawala Dinamika Energi</h5>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay=".3s">
                                <div class="single-box mb-30">
                                    <img src="{{ asset('assets/web/images/ces-logo.png') }}" alt="icon" class="icon">
                                    <img src="{{ asset('assets/web/images/ces-logo.png') }}" alt="icon" class="icon-fade">
                                    <h5 class="title">PT. Cereno Energi Selaras</h5>
                                </div>
                            </div>
                                <div class="col-md-4 wow fadeIn" data-wow-delay=".3s">
                                <div class="single-box mb-30">
                                    <img src="{{ asset('assets/web/images/jyl-logo.png') }}" alt="icon" class="icon">
                                    <img src="{{ asset('assets/web/images/jyl-logo.png') }}" alt="icon" class="icon-fade">
                                    <h5 class="title">PT. JYL Indo Minning</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
