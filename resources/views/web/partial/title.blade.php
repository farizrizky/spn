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
</style>
<section class="breadcrumb-area" style="background-image: url('{{ asset('assets/web/images/truckdistribution.png') }}');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title">{{ $title }}</h2>
                @if($title)
                    <ul class="breadcrumb-menu">
                        <li><a href="{{ route('web.home') }}">Beranda</a></li>
                        <li><span class="icon"><i class="ri-arrow-right-s-line"></i></span></li>
                        <li class="active">{{ $title }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>

