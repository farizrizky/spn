@extends('cms.template.panel')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard</h3>
                    <h6 class="op-7 mb-2">{{ DateHelper::fullDateFormat(now()) }}</h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-oil-can"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Produk</p>
                                        <h4 class="card-title">{{ $product_total }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Blog</p>
                                        <h4 class="card-title">{{ $blog_total }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Pengunjung Hari Ini</p>
                                        <h4 class="card-title">{{ $visitor_today }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-round">
                        <div class="card-header">
                            <h4 class="card-title">Pengunjung</h4>
                        </div>
                        <div class="card-body">
                           <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="visitorChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-round">
                        <div class="card-header">
                            <h4 class="card-title">Top 3 Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-list py-4">
                                @foreach($top_product as $tp)
                                <div class="item-list">
                                    <div class="avatar">
                                    <img src="{{ $tp->productImage->first()->image_path }}" alt="..." class="avatar-img rounded-circle"/>
                                    </div>
                                    <div class="info-user ms-3">
                                        <div class="username">{{ $tp->name }}</div>
                                        <div class="status">
                                            {{ $tp->view_count }} kali dilihat
                                        </div>
                                    </div>
                                    <a target="_blank" href="{{ route('web.product-detail', $tp->slug) }}" class="btn btn-icon btn-link btn-info op-8">
                                        <i class="fas fa-external-link-alt fa-xs"></i> 
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card card-round">
                        <div class="card-header">
                            <h4 class="card-title">Top 3 Blog</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-list py-4">
                                @foreach($top_blog as $tb)
                                <div class="item-list">
                                    <div class="avatar">
                                    <img src="{{ $tb->image_path }}" alt="..." class="avatar-img rounded-circle"/>
                                    </div>
                                    <div class="info-user ms-3">
                                        <div class="username">{{ $tb->title }}</div>
                                        <div class="status">
                                            {{ $tb->view_count }} kali dilihat
                                        </div>
                                    </div>
                                    <a target="_blank" href="{{ route('web.blog-detail', $tb->slug) }}" class="btn btn-icon btn-link btn-info op-8">
                                        <i class="fas fa-external-link-alt fa-xs"></i> 
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('/assets/cms/js/plugin/chart.js/chart.min.js') }}"></script>
<script>

    const ctx = document.getElementById('visitorChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($visitor_last_30_days_date),
            datasets: [{
                label: 'Pengunjung',
                data: @json($visitor_last_30_days_count),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Jumlah Pengunjung'
                    }
                }
            }
        }
    });
</script>
@endsection
