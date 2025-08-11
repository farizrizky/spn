@php
    $testimonial = DataHelper::getTestimonial();
@endphp
<section class="testimonial-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                <div class="review-part">
                    <div class="section-top">
                        <span class="sub-title">Testimoni</span>
                        <h3 class="title mt-10">Testimoni <span>Client</span></h3>

                        <div class="testimonial-slider mt-40">
                            @foreach($testimonial as $t)
                            <div class="single-testimonial">
                                <div class="top-content d-flex align-items-center justify-content-between">
                                    <div class="left d-flex align-items-center gap-4">
                                        @if($t->image_path)
                                        <img src="{{ $t->image_path }}" alt="reviewer" class="reviewer">
                                        @endif
                                        <div class="author-info">
                                            <h5 class="title">{{ $t->name }}</h5>
                                            <span class="designation">{{ $t->job }}</span>
                                        </div>
                                    </div>
                                    <div class="right">
                                        @if($t->logo_path)
                                        <img src="{{ $t->logo_path }}" alt="logo" class="icon">
                                        @endif
                                    </div>
                                </div>
                                <span class="divider"></span>
                                <i class="fs-5">
                                    "{{ $t->testimonial }}"
                                </i>
                            </div>
                            @endforeach
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