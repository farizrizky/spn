@extends('web.template.web')
@section('content')
    {!! $partial_title !!}
    <section class="project-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                @php $count = 1; @endphp
                @foreach($product_category as $pc)
                    <div class="col-md-6 wow fadeIn" data-wow-delay="{{ 0.1 + ($count * 0.1) }}s">
                        <div class="single-project">
                            <a href=""><img src="{{ asset('storage/' . $pc['image_path']) }}" alt="project"></a>
                            <div class="hover-state">
                                <a href="" class="category">{{ $pc['name'] }}</a>
                                <h5 class="title"><a href="{{ route('web.product-list', ['product_category_slug' => $pc['slug']]) }}">Temukan Produk {{ $pc['name'] }}</a></h5>
                            </div>
                        </div>
                    </div>
                    @php $count++; @endphp
                @endforeach
            </div>
        </div>
    </section>
@endsection
