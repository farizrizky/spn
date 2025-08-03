<!-- service area starts -->
<section class="service-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeInLeft" data-wow-delay=".2s">
                <div class="section-top">
                    <span class="sub-title">Produk</span> 
                    <h3 class="title mt-10">Produk <span>yang Kami Sediakan</span></h3>
                    <p class="mt-20">
                        Kami menyediakan produk Repsol Lubricants terbaik yang dapat diandalkan diberbagai jenis industri.
                    </p>
                </div>
            </div>
        </div>
        <div class="service-slider mt-50 wow fadeInRight" data-wow-delay=".2s">
            @foreach($data_type as $type)
                <div class="single-service single-card dark-bg " data-background="{{ asset('storage/' . $type->image_path) }}" style="border-style:none;">
                    <h5 class="title mb-100"><a href="{{ route('web.product', ['type' => $type->slug]) }}" class="text-white">{{ $type->name }}</a></h5>
                    <a href="{{ route('web.product', ['type' => $type->slug]) }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="service-bg-card d-none d-sm-block" style="background-image: url('{{ asset('assets/web/images/coalloaded1.png') }}');background-size: cover; background-color:rgb(255, 225, 255, 0);"></div>
</section>