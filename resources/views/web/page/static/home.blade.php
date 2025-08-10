@extends('web.template.web')

@section('content')
<!-- hero area starts -->
    @include('web.partial.hero-slider')
<!-- about area starts -->

    @include('web.partial.about')

    @include('web.partial.type')

    @include('web.partial.service2')

    @include('web.partial.business-partner')

    <section class="testimonial-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="review-part">
                        <div class="section-top">
                            <span class="sub-title">Testimoni</span>
                            <h3 class="title mt-10">Testimoni <span>Client</span></h3>

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
                            <form method="POST" id="contactForm" class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" placeholder="Nama Anda" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" placeholder="Email Anda" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="tel" name="phone" placeholder="Nomor Telepon" required>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="subject" required>
                                            <option value="">Pilih Topik</option>
                                            <option value="Informasi Produk">Informasi Produk</option>
                                            <option value="Informasi Layanan">Informasi Layanan</option>
                                            <option value="Informasi Kemitraan">Informasi Kemitraan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" placeholder="Pertanyaan Anda"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    
                                    <button id="contactFormSubmit" class="primary-btn primary-bg"><span class="text">Kirim</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></button>
                                    <span class="form-message"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blog area starts -->
    {!! $partial_recent_blog !!}
    <!-- cta area starts -->
    @include('web.partial.cta')
    
@endsection

@section('script')
    <script>
        $('#contactFormSubmit').on('click', function(e) {
            e.preventDefault();
            $('.form-message').text('Mengirim...');
            var form = $('#contactForm');
            var formData = form.serialize();

            $.ajax({
                url: '{{ route('web.contact-form.store') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        form[0].reset();
                    }
                    $('.form-message').text(response.message);
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    for (var key in errors) {
                        errorMessage += errors[key][0] + '\n';
                    }
                    $('.form-message').text(errorMessage);
                }
            });
        });
    </script>
@endsection