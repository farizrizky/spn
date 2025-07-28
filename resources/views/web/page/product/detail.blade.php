@extends('web.template.web')
@section('content')
    {!! $partial_title !!}
    <style>
        #carouselExampleCaptions {
            max-width: 300px;
            margin: 0 auto;
            overflow: hidden;
        }

        #carouselExampleCaptions .carousel-item img {
            width: 300px;
            object-fit: cover;
            object-position: center;
        }
    </style>
    <section class="project-details pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeIn text-center" data-wow-delay=".2s">
                    <div class="d-flex justify-content-center">
                        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach($product->productImage as $index => $image)
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($product->productImage as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ $image->image_path }}" class="d-block w-100" alt="{{ $product->name }} Image {{ $index + 1 }}" >
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay=".3s">
                    <h3 class="title">{{ $product->name }}</h3>
                    {!! $product->description !!}

                    <div class="mt-30 w-100">
                        <a href="https://wa.me/1234567890" class="primary-btn">
                            <span  class="text">Dapatkan Produk Ini</span>
                            <span  class="icon" style="background-color:#25D366;color:white;"><i class="ri-whatsapp-line"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-100">
                    <h4 class="title mb-50">Deskripsi Produk</h4>
                    <div class="accordion custom-accordion" id="accordionExample">
                        <!-- Item 1 -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed custom-accordion-btn" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="false" aria-controls="collapseOne">
                                    <h6>Quality levels, approvals and recommendations</h6>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $product->qualityLevel()->pluck('name')->join(', ') }}
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed custom-accordion-btn" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    <h6>Spesifikasi</h6>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @livewire('web.partial.cta') --}}
    </section>
@endsection
