@extends('web.template.web')
@section('content')
    {!! $partial_title !!}
    <div class="error-area pt-110 pb-120">
        <div class="container">
            <div class="col-lg-6 offset-lg-3">
                <div class="error-wrapper">
                    <h1 class="title mb-20">4<span>0</span>4</h1>
                    <h2>Halaman Tidak Ditemukan!</h2>
                    <p>Halaman yang Anda cari tidak ditemukan, mungkin tidak ada atau telah dihapus.</p>
                    <a href="{{ route('web.home') }}" class="primary-btn primary-bg mt-30"><span class="text">kembali ke beranda</span> <span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
