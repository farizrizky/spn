<!-- service area starts -->
<section class="service-area py-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-top">
                    <span class="sub-title">Produk</span> 
                    <h3 class="title mt-10">Produk <span>yang Kami Sediakan</span></h3>
                </div>
            </div>
        </div>
        <div class="service-slider mt-50">
            @foreach($data_type as $type)
                <div class="single-service single-card dark-bg " data-background="{{ asset('storage/' . $type->image_path) }}">
                    <h5 class="title mb-100"><a href="{{ route('web.product', ['type' => $type->slug]) }}" class="text-white">{{ $type->name }}</a></h5>
                    <a href="{{ route('web.product', ['type' => $type->slug]) }}" class="secondary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="service-bg-card d-none d-sm-block" style="background-image: url('{{ asset('assets/web/images/coalloaded.png') }}');background-size: cover;"></div>
</section>