@extends('web.template.web')

@section('content')
    {!! $partial_title !!}
    <style>
        .custom-single-project {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 240px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }

        .custom-hover-state {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 2;
            background: rgba(0, 0, 0, 0.4);
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            word-break: break-word;
            transition: background 0.3s ease, opacity 0.3s ease;
        }

        .custom-hover-state .category {
            font-weight: bold;
            margin-bottom: 6px;
            color: #fff;
        }

        .custom-hover-state .title {
            margin: 0;
            font-size: 1.1rem;
            color: #fff;
            transition: transform 0.3s ease;
        }

        .custom-single-project:hover .custom-hover-state {
            background: rgba(0, 0, 0, 0.7);
        }

        .custom-single-project:hover .custom-hover-state .title {
            transform: translateY(-6px);
        }
    </style>

    <section class="project-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                @php $count = 1; @endphp
                @foreach($type as $t)
                    <div class="col-md-6 col-lg-4 mb-4 wow fadeIn" data-wow-delay="{{ 0.1 + ($count * 0.1) }}s">
                        <div class="custom-single-project" 
                             style="background-image: url('{{ $t['image_path'] }}');">
                            <a href="{{ route('web.product-type-detail', ['slug' => $t['slug']]) }}" class="stretched-link"></a>

                            <div class="custom-hover-state">
                                <div class="category">{{ $t['name'] }}</div>
                                <h5 class="title">Temukan Produk {{ $t['name'] }}</h5>
                            </div>
                        </div>
                    </div>
                    @php $count++; @endphp
                @endforeach
            </div>
        </div>
    </section>
@endsection
