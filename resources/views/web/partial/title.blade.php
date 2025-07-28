<section class="breadcrumb-area" data-background="{{ asset('assets/web/images/truckdistribution.png') }}">
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
