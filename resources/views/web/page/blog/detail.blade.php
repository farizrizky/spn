@extends('web.template.web')

@section('content')
    {!! $partial_title !!}
    <section class="blog-details pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-content">
                        <div class="blog-thumbnail mb-30">
                            <img src="{{ $blog->image_path }}" alt="blog">
                        </div>

                        <ul class="blog-meta mb-20">
                            <li><a href="#"><span class="icon"><i class="ri-calendar-line"></i></span> {{ DateHelper::fullDateFormatWithoutTime($blog->date) }}</a></li>
                            <li><a href="#"><span class="icon"><i class="ri-user-line"></i></span> oleh {{ $blog->user->name }}</a></li>
                            <li><a href="{{ route('web.blog-category', ['slug' => $blog->blogCategory->slug]) }}"><span class="icon"><i class="ri-book-line"></i></span> {{ $blog->blogCategory->name }}</a></li>
                        </ul>
                        <h3 class="title">{{ $blog->title }}</h3>
                        <p class="mt-20">{!! $blog->content !!}</p>
                        <div class="sidebar-widget tags-widget mt-30" style="border-style:none;">
                            <span class="widgets-title">Tags:</span>
                            @foreach($blog->blogTag as $tag)
                                <a href="{{ route('web.blog-tag', ['slug' => $tag->slug]) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>  
                        {{-- <div class="page-pagination mt-30">
                            <a href="{{ $blog->previous()->url }}"><span class="icon"><i class="ri-arrow-left-s-line"></i></span> Previous post</a>
                            <a href="{{ $blog->next()->url }}">next post <span class="icon"><i class="ri-arrow-right-s-line"></i></span></a>
                        </div> --}}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget search-widget">
                            <h4 class="widget-title">Cari</h4>
                            <div class="search-form">
                                <form action="{{ route('web.blog-search') }}" method="GET">
                                    <input type="text" name="search" placeholder="Cari...">
                                    <button type="submit"><span class="icon"><i class="ri-search-line"></i></span></button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Kategori</h4>
                            <ul>
                                @foreach($blog_category as $c)
                                    <li><a href="{{ route('web.blog-category', ['slug' => $c->slug]) }}">{{ $c->name }}<span class="arrow-icon"><i class="ri-arrow-right-double-line"></i></span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Informasi Terbaru</h4>
                            @if($recent_blog->isNotEmpty())
                                @foreach($recent_blog as $rb)
                                    <div class="single-post">
                                        <div class="post-thumb">
                                            <a href="{{ route('web.blog-detail', ['slug' => $rb->slug]) }}"><img src="{{ $rb->image_path }}" alt="post"></a>
                                        </div>
                                        <div class="post-content">
                                            <a href="{{ route('web.blog-category', ['slug' => $rb->blogCategory->slug]) }}"><span class="icon"><i class="ri-folder-open-line"></i></span> {{ $rb->blogCategory->name }}</a>
                                            <h6 class="title"><a href="{{ route('web.blog-detail', ['slug' => $rb->slug]) }}">{{ Str::limit(strip_tags($rb->title), 50) }}</a></h6>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Belum ada informasi terbaru.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


                    
