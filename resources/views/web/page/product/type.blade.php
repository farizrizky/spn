@extends('web.template.web')
@section('content')
    {!! $partial_title !!}
    <section class="project-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                @php $count = 1; @endphp
                @foreach($type as $t)
                    <div class="col-md-6 wow fadeIn" data-wow-delay="{{ 0.1 + ($count * 0.1) }}s">
                        <div class="single-project">
                            <a href="{{ route('web.product', ['type' => $t['slug']]) }}"><img src="{{ asset('storage/' . $t['image_path']) }}" alt="project"></a>
                            <div class="hover-state">
                                <a href="{{ route('web.product', ['type' => $t['slug']]) }}" class="category">{{ $t['name'] }}</a>
                                <h5 class="title"><a href="{{ route('web.product', ['type' => $t['slug']]) }}">Temukan Produk {{ $t['name'] }}</a></h5>
                            </div>
                        </div>
                    </div>
                    @php $count++; @endphp
                @endforeach
            </div>
        </div>
    </section>
@endsection
