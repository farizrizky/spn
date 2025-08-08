<style>
    .hero-area {
        position: relative;
        z-index: 1;
        min-height: 100vh;
        display: flex;
        
    }

    .hero-area .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .hero-area > .container {
        position: relative;
        z-index: 2;
    }


</style>
<div class="hero-slider">
@foreach($website_cover as $wc)
    <section class="hero-area" data-background="{{ $wc->background_path }}">
        <div class="overlay" style="background-color: {{ $wc->overlay_color }}; opacity: {{ $wc->overlay_opacity ?? 0.5 }};"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    @if($wc->title_position == 'left')
                    <div class="hero-content">
                        <div class="section-top">
                            <span class="sub-title wow fadeIn" style="color: {{ $wc->subtitle_color }}" data-wow-duration="1s">{{ $wc->subtitle }}</span>
                            @if($wc->title_size == 'large')
                                <h1 class="title mt-20 wow fadeIn" data-wow-duration="1s" style="color: {{ $wc->title_color }}">
                                    {{ $wc->title }}
                                </h1>
                            @elseif($wc->title_size == 'medium')
                                <h2 class="title mt-20 wow fadeIn" data-wow-duration="1s" style="color: {{ $wc->title_color }}">
                                    {{ $wc->title }}
                                </h2>
                            @elseif($wc->title_size == 'small')
                                <h3 class="title mt-20 wow fadeIn" data-wow-duration="1s" style="color: {{ $wc->title_color }}">
                                    {{ $wc->title }}
                                </h3>
                            @endif
                            <p class="description wow fadeIn" data-wow-duration="1s" style="color: {{ $wc->paragraph_color }}">{{ $wc->paragraph }}</p>
                        </div>

                        @if($wc->button_type != 'none')
                            <div class="button-group mt-30 wow fadeInUp" data-wow-duration="1s">
                                @if($wc->button_type == 'border')
                                    <a href="{{ $wc->button_url }}" class="primary-btn secondary-bg"><span class="text">{{ $wc->button_text }}</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                                @elseif($wc->button_type == 'filled')
                                    <a href="{{ $wc->button_url }}" class="secondary-btn primary-bg"><span class="text">{{ $wc->button_text }}</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                                @endif
                            </div>
                        @endif
                    </div>

                    @else
                        <div class="hero-image">
                            @if($wc->image_path)
                                <img src="{{ $wc->image_path }}" alt="hero" class="
                                    @if($wc->image_frame == 'circle') 
                                        hero-image-1 
                                    @elseif($wc->image_frame == 'rounded') 
                                        hero-image-2 
                                    @else 
                                        img-fluid 
                                    @endif

                                    @if($wc->is_image_floating)
                                        hero-image-floating
                                    @endif
                                ">
                            @endif
                        </div>
                    @endif
                </div>

                <div class="col-lg-6">
                    @if($wc->title_position == 'left')
                   <div class="hero-image">
                        @if($wc->image_path)
                            <img src="{{ $wc->image_path }}" alt="hero" class="
                                @if($wc->image_frame == 'circle') 
                                    hero-image-1 
                                @elseif($wc->image_frame == 'rounded') 
                                    hero-image-2 
                                @else 
                                    img-fluid 
                                @endif

                                @if($wc->is_image_floating)
                                    hero-image-floating
                                @endif
                            ">
                        @endif
                    </div>

                    @else
                    <div class="hero-content">
                        <div class="section-top">
                            <span class="sub-title wow fadeIn" style="color: {{ $wc->subtitle_color }}" data-wow-duration="1s">{{ $wc->subtitle }}</span>
                            @if($wc->title_size == 'large')
                                <h1 class="title mt-20 wow fadeIn" data-wow-duration="1s" style="color: {{ $wc->title_color }}">
                                    {{ $wc->title }}
                                </h1>
                            @elseif($wc->title_size == 'medium')
                                <h2 class="title mt-20 wow fadeIn" data-wow-duration="1s" style="color: {{ $wc->title_color }}">
                                    {{ $wc->title }}
                                </h2>
                            @elseif($wc->title_size == 'small')
                                <h3 class="title mt-20 wow fadeIn" data-wow-duration="1s" style="color: {{ $wc->title_color }}">
                                    {{ $wc->title }}
                                </h3>
                            @endif
                            <p class="description wow fadeIn" data-wow-duration="1s" style="color: {{ $wc->paragraph_color }}">{{ $wc->paragraph }}</p>
                        </div>

                        @if($wc->button_type != 'none')
                            <div class="button-group mt-30 wow fadeInUp" data-wow-duration="1s">
                                @if($wc->button_type == 'border')
                                    <a href="{{ $wc->button_url }}" class="primary-btn secondary-bg"><span class="text">{{ $wc->button_text }}</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                                @elseif($wc->button_type == 'filled')
                                    <a href="{{ $wc->button_url }}" class="secondary-btn primary-bg"><span class="text">{{ $wc->button_text }}</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                                @endif
                            </div>
                        @endif

                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endforeach
</div>

@section('script')
<script>
    //remove arrow slick
    
    $(document).ready(function() {
        // Initialize the hero area with a parallax effect
       $('.slick-arrow').remove();
       $('.slick-dots').remove();
    });
</script>
@endsection