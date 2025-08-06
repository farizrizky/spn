@extends('web.template.web')

@section('content')
    {!! $partial_title !!}
    <section class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="contact-info">
                        <h3 class="title">Diskusikan Bersama Kami</h3>
                        <p class="mt-20">
                            Kami siap membantu Anda dengan segala kebutuhan informasi terkait produk dan layanan kami. Jangan ragu untuk menghubungi kami melalui form di bawah ini atau melalui informasi kontak yang tersedia.
                        </p>
                        <div class="info-items mt-30">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="single-info d-flex align-items-center gap-3">
                                        <div class="info-icon">
                                            <span class="icon"><i class="ri-phone-fill"></i></span> 
                                        </div>
                                        <div class="info-text">
                                            <h5 class="title">Telepon</h5>
                                            <a href="#">{{ DataHelper::getContactData('telepon') ? DataHelper::getContactData('telepon')->value : '' }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-info d-flex align-items-center gap-3">
                                        <div class="info-icon">
                                            <span class="icon"><i class="ri-mail-fill"></i></span>
                                        </div>
                                        <div class="info-text">
                                            <h5 class="title">Email</h5>
                                            <a href="#">{{ DataHelper::getContactData('email') ? DataHelper::getContactData('email')->value : '' }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-info d-flex align-items-center gap-3">
                                        <div class="info-icon">
                                            <span class="icon"><i class="ri-map-pin-2-fill"></i></span>
                                        </div>
                                        <div class="info-text">
                                            <h5 class="title">Alamat</h5>
                                            <a href="#">{{ DataHelper::getContactData('alamat') ? DataHelper::getContactData('alamat')->value : '' }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contact-social">
                            <ul>
                                <li><a href="{{ DataHelper::getContactData('linkedin') ? DataHelper::getContactData('linkedin')->url : '' }}"><i class="ri-linkedin-line"></i></a></li>
                                <li><a href="{{ DataHelper::getContactData('instagram') ? DataHelper::getContactData('instagram')->url : '' }}"><i class="ri-instagram-line"></i></a></li>
                                <li><a href="{{ DataHelper::getContactData('tiktok') ? DataHelper::getContactData('tiktok')->url : '' }}"><i class="ri-tiktok-fill"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".2s">
                    <div class="form-part">
                        <h4 class="title">Biarkan Kami Membantu Anda</h4>
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
@endsection
@section('script')
    <script>
        $('#contactFormSubmit').on('click', function(e) {
            e.preventDefault();
            $('.form-message').text('Mengirim...');
            var form = $('#contactForm');
            var formData = form.serialize();

            $.ajax({
                url: '{{ route('web.contact-form.store') }}', // Adjust the URL to your contact form submission route
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
