<style>
    .breadcrumb-area {
        background-size: cover;
        background-position: center ;
        background-position-x: center;
        background-position-y: center;
        background-repeat: no-repeat;
        background-attachment: fixed; /* Efek parallax */
        min-height: 500px; /* Setinggi minimal 300px */
        display: flex;
        padding: 120px 0; /* Jarak atas bawah */
        text-align: center;
        color: white;
    }

    .breadcrumb-area .title {
        font-size: 60px;
        font-weight: 700;
        color: white;
        margin-top: 40px; 
    }

    .breadcrumb-menu {
        list-style: none;
        padding: 0;
        display: inline-flex;
        gap: 8px;
        justify-content: center;
        color: white;
    }

    .breadcrumb-menu li a {
        color: white;
        text-decoration: none;
    }

    .breadcrumb-menu li.active {
        font-weight: 600;
        color: #ffd369;
    }

    .breadcrumb-area .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
</style>
<section class="breadcrumb-area" style="background-image: url('{{ $website_header->background_path }}');">
    <div class="overlay" style="background-color: {{ $website_header->overlay_color }}; opacity: {{ $website_header->overlay_opacity }}"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title" style="color: {{ $website_header->text_color }}">{{ $title }}</h2>
                @if($title)
                    <ul class="breadcrumb-menu">
                        <li><a href="{{ route('web.home') }}" style="color: {{ $website_header->text_color }}">Beranda</a></li>
                        <li><span class="icon" style="color: {{ $website_header->text_color }}"><i class="ri-arrow-right-s-line"></i></span></li>
                        <li class="active" style="color: {{ $website_header->text_color }}">{{ $title }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>

