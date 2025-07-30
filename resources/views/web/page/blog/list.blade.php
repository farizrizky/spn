@extends('web.template.web')
@section('content')
    {!! $partial_title !!}
    <section class="pricing-area pb-90 pt-120">
        <div class="container">
            <div class="row">
                @if($blog->isEmpty())
                    <div class="col-md-12">
                        <div class="text-center">
                            <h3 class="title">Tidak ada postingan yang ditemukan</h3>
                            <p>Silakan cek kembali kategori atau hubungi kami untuk informasi lebih lanjut.</p>
                        </div>
                    </div>
                @endif
                @foreach ($blog as $b)
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".2s">
                        <div class="single-blog-2">
                            <div class="blog-thumbnail">
                                <a href=""><img src="{{ $b->image_path }}" alt="blog" style="max-width: 100%; max-height: 200px;  object-fit: cover;object-position: center;"></a>
                                <ul class="blog-meta">
                                    <li><a href="#"><span class="icon"><i class="ri-calendar-line"></i></span> {{ DateHelper::fullDateFormatWithoutTime($b->date) }}</a></li>
                                    <li><a href="{{ route('web.blog', ['category' => $b->blogCategory->slug]) }}"><span class="icon"><i class="ri-book-line"></i></span> {{ $b->blogCategory->name }}</a></li>
                                </ul>
                            </div>
                            <div class="blog-content" style="height: 300px; overflow: hidden;">
                                <h5 class="title"><a href="{{ route('web.blog-detail', ['slug' => $b->slug]) }}">{{ Str::limit(strip_tags($b->title), 50) }}</a></h5>
                                <p class="mt-20">{{ Str::limit(strip_tags($b->content), 120) }}</p>
                                <a href="{{ route('web.blog-detail', ['slug' => $b->slug]) }}" class="page-link-url mt-20"><span class="text">Selengkapnya</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                            </div>
                        </div>            
                    </div>
                @endforeach
                {{ $blog->links('vendor.pagination.web-pagination') }}
            </div>
        </div>
    </section>
@endsection