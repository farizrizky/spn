<section class="blog-area pt-120 pb-120"  style="background-color: #f8f9fa;">
    <div class="container">
        <div class="section-top">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-top text-center wow fadeInUp" data-wow-delay=".2s">
                        <span class="sub-title">Informasi</span> 
                        <h3 class="title mt-10">Informasi <span>Terkini</span></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog-posts mt-50">
            <div class="row">
                @foreach($blog as $b)
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="single-blog">
                        <div class="blog-thumbnail">
                            <a href="{{ route('web.blog-detail', $b->slug) }}"><img src="{{ $b->image_path }}" alt="blog" style="max-width: 100%; max-height: 200px;  object-fit: cover;object-position: center;"></a>
                        </div>
                        <div class="blog-content" style="height: 300px; overflow: hidden;">
                            <ul class="blog-meta mb-20">
                                <li><a href="#"><span class="icon"><i class="ri-calendar-line"></i></span> {{ DateHelper::fullDateFormatWithoutTime($b->date) }}</a></li>
                                @if($b->user)
                                <li><a href="#"><span class="icon"><i class="ri-user-line"></i></span> by {{ $b->user->name }}</a></li>
                                @endif
                            </ul>

                            <h5 class="title"><a href="{{ route('web.blog-detail', $b->slug) }}">{{ $b->title }}</a></h5>

                            <a href="{{ route('web.blog-detail', $b->slug) }}" class="primary-btn mt-20"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="blog-button text-center mt-20">
            <a href="{{ route('web.blog') }}" class="primary-btn primary-bg"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
        </div>
    </div>
    
</section>