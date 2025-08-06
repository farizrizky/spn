<style>
    .hero-area {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed; /* Efek parallax */
        min-height: 100vh; /* Setinggi minimal 1 layar */
        display: flex;
        align-items: center; /* Agar konten di tengah secara vertikal */
    }

</style>

    <div class="hero-slider">
        <section class="hero-area" data-background="{{ asset('assets/web/images/index-bg.jpg') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="hero-content">
                            <div class="section-top">
                                <span class="sub-title white-color wow fadeIn" data-wow-duration="1s">PT. Sindo Prima Niaga</span>
                                <h1 class="title white-color mt-20 wow fadeIn" data-wow-duration="1s">Professional, <span>Fast, Safe and Competitive</span></h1>
                            </div>

                            <div class="button-group mt-30">
                                <a  class="primary-btn secondary-bg wow fadeInUp" data-wow-duration="1s"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>

                                <div class="phone-text white-color wow fadeInUp" data-wow-duration="1s">
                                    <img src="{{ asset('assets/web/images/icon-1.png') }}" alt="icon">
                                    <div class="text-part">
                                        <span>Butuh Bantuan?</span>
                                        <h5 class="title"><a href="https://wa.me/1234567890">(307) 555-0133</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="hero-image">
                            <img src="{{ asset('assets/web/images/truckdistribution.png') }}" alt="hero" class="hero-image-1">
                            <img src="{{ asset('assets/web/images/lubestation.png') }}" alt="hero" class="hero-image-2">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="hero-area" data-background="{{ asset('assets/web/images/cta-bg.jpg') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="hero-content">
                    <div class="section-top">
                        <span class="sub-title white-color wow slideInDown" data-wow-duration="1s">PT. Sindo Prima Niaga</span>
                        <h1 class="title white-color mt-20 wow slideInUp" data-wow-duration="1s">Professional, <span>Fast, Safe and Competitive</span></h1>
                    </div>

                    <div class="button-group mt-30 wow fadeInUp" data-wow-duration="1s">
                        <a wire:navigate href="{{ route('web.profile') }}" class="primary-btn secondary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>

                        <div class="phone-text white-color wow fadeInUp" data-wow-duration="1s">
                            <img src="{{ asset('assets/web/images/icon-1.png') }}" alt="icon">
                            <div class="text-part">
                                <span>Butuh Bantuan?</span>
                                <h5 class="title"><a href="https://wa.me/1234567890">(307) 555-0133</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="hero-image">
                    <div class="d-flex justify-content-center">
                        <img class="img-fluid d-block d-sm-none" src="{{ asset('assets/web/images/drums.png') }}" style="width:300px;" alt="drum">
                        <img class="img-fluid d-none d-sm-block" src="{{ asset('assets/web/images/drums.png') }}" style="width:500px;" alt="drum">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
{{-- </div>
@if($type == 'default')
<section class="hero-area" data-background="{{ asset('assets/web/images/index-bg.jpg') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="hero-content">
                    <div class="section-top">
                        <span class="sub-title white-color">PT. Sindo Prima Niaga</span>
                        <h1 class="title white-color mt-20">Professional, <span>Fast, Safe and Competitive</span></h1>
                    </div>

                    <div class="button-group mt-30">
                        <a wire:navigate href="\" class="primary-btn secondary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>

                        <div class="phone-text white-color">
                            <img src="{{ asset('assets/web/images/icon-1.png') }}" alt="icon">
                            <div class="text-part">
                                <span>Butuh Bantuan?</span>
                                <h5 class="title"><a href="https://wa.me/1234567890">(307) 555-0133</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="hero-image">
                    <img src="{{ asset('assets/web/images/truckdistribution.png') }}" alt="hero" class="hero-image-1">
                    <img src="{{ asset('assets/web/images/lubestation.png') }}" alt="hero" class="hero-image-2">
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Custom Hero1 -->
@if($type == 'custom1')
<section class="hero-area" data-background="{{ asset('assets/web/images/cta-bg.jpg') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="hero-content">
                    <div class="section-top">
                        <span class="sub-title white-color">PT. Sindo Prima Niaga</span>
                        <h1 class="title white-color mt-20">Professional, <span>Fast, Safe and Competitive</span></h1>
                    </div>

                    <div class="button-group mt-30">
                        <a wire:navigate href="{{ route('web.profile') }}" class="primary-btn secondary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>

                        <div class="phone-text white-color">
                            <img src="{{ asset('assets/web/images/icon-1.png') }}" alt="icon">
                            <div class="text-part">
                                <span>Butuh Bantuan?</span>
                                <h5 class="title"><a href="https://wa.me/1234567890">(307) 555-0133</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="hero-image">
                    <div class="d-flex justify-content-center">
                        <img class="img-fluid d-block d-sm-none" src="{{ asset('assets/web/images/drums.png') }}" style="width:300px;" alt="drum">
                        <img class="img-fluid d-none d-sm-block" src="{{ asset('assets/web/images/drums.png') }}" style="width:500px;" alt="drum">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif --}}

@section('script')
<script>
    //remove arrow slick
    
    $(document).ready(function() {
        // Initialize the hero area with a parallax effect
       $('.slick-arrow').remove();
       //auto slide
       $('.blog-slider').slick({
            autoplay: true,
            autoplaySpeed: 1000, 
       });
    });
</script>
@endsection