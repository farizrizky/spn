@extends('web.template.web')
@section('content')
    {!! $partial_title !!}
    <section class="pricing-area pb-90 pt-120">
        <div class="container">
            <div class="row">
                @if($product->isEmpty())
                    <div class="col-md-12">
                        <div class="text-center">
                            <h3 class="title">Tidak ada produk yang ditemukan</h3>
                            <p>Silakan cek kembali kategori atau hubungi kami untuk informasi lebih lanjut.</p>
                        </div>
                    </div>
                @endif
                @foreach ($product as $p)
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".2s">
                        <div class="single-service">
                            @if($p->productImage->isNotEmpty())
                                <div class="d-flex justify-content-center align-items-center mb-30">
                                    <img src="{{ $p->productImage->first()->image_path }}"  style="width:100px;" alt="icon">
                                </div>
                            @endif
                            <h5 class="title text-center"><a href="{{ route('web.product-detail', ['product_slug' => $p->slug]) }}">{{ $p->name }}</a></h5>
                            <p class="mt-10 text-center">{{ Str::limit(strip_tags($p->description), 120) }}</p>
                            <div class="d-flex justify-content-center align-items-center mb-30">
                                <a href="{{ route('web.product-detail', ['product_slug' => $p->slug]) }}" class="primary-btn mt-20"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                            </div>
                        </div>                    
                    </div>
                @endforeach
                {{ $product->links('vendor.pagination.web-pagination') }}
            </div>
        </div>
    </section>
@endsection