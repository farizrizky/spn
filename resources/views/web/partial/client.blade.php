@php 
    $client = DataHelper::getClient(); 
    $totalClient = $client->count();
    if($totalClient % 2 == 0){
        $colClass = 'col-md-6';
    } else {
        $colClass = 'col-md-4';
    }
@endphp
<section class="service-details pt-120 pb-120" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" >
                <div class="service-content text-center">
                    <div class="section-top wow fadeInUp" data-wow-delay=".2s">
                        <h5 class="subtitle">Mitra</h5>
                        <h3 class="title">Mitra <span>Bisnis Kami</span></h3>
                        <p class="mt-20">
                            Sindo Prima Niaga sebagai distributor resmi oil Repsol telah menjadi kepercayaan banyak perusahaan dalam menyediakan dan mendistribusikan oli industri. Kami berkomitmen untuk memberikan produk dan layanan terbaik kepada mitra bisnis kami. Berikut adalah beberapa mitra bisnis kami yang telah bekerja sama dengan kami dalam project consignment.
                        </p>
                    </div>
                    
                    <div class="row justify-content-center mt-30">
                        @foreach($client as $c)
                        <div class="{{ $colClass }} wow fadeInDown" data-wow-delay=".5s">
                            <div class="single-box mb-30">
                                <img src="{{ $c->image_path }}" alt="icon" class="icon">
                                <img src="{{ $c->image_path }}" alt="icon" class="icon-fade">
                                <h5 class="title">{{ $c->name }}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>