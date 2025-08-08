@extends('cms.template.panel')

@section('content')
<style>
    .image-wrapper {
        position: relative;
        display: inline-block;
        }

        .image-wrapper img {
        display: block;
        width: 100%; /* atau ukuran spesifik */
        height: auto;
        }

        .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        transition: opacity 0.3s ease;
    }
</style>
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Website Header Baru</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            
        </div>
    </div>
    <form method="POST" action="{{ route('cms.website-header.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group form-inline row">
                            <label for="name" class="col-md-3 col-form-label text-wrap"><b>Nama</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ old('name') }}" name="name" id="name" required>
                                <div class="invalid-feedback">Nama harus diisi</div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="text_color" class="col-md-3 col-form-label text-wrap"><b>Warna Teks</b></label>
                            <div class="col-md-9 p-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="#FFFFFF" name="text_color" id="text_color" placeholder="#FFFFFF">
                                    <input type="color" class="form-control" id="text_color_picker" value="#FFFFFF">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="background_image" class="col-md-3 col-form-label text-wrap"><b>Gambar Background</b></label>
                            <div class="col-md-9 p-0">
                                <div class="btn-group " role="group" id="backgroundUploadButtons">
                                    <button type="button" class="btn btn-primary btn-sm float-end openFileUpload" data-allow="image/*" data-key="background" >
                                        <i class="fa fa-upload"></i> Upload Gambar
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm float-end openCustomUrl" data-key="background">
                                        <i class="fa fa-link"></i> Dari URL
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm float-end" id="removeBackground" >
                                        <i class="fa fa-trash"></i> Hapus Gambar
                                    </button>
                                </div>
                                <hr>
                                <div class="image-wrapper">
                                    <input type="hidden" name="background_path" id="background_path" value="">
                                    <img id="backgroundPreview" class="img-fluid mt-2" src="" alt="Preview Gambar"/>
                                    <div class="overlay"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="text_color" class="col-md-3 col-form-label text-wrap"><b>Warna Overlay</b></label>
                            <div class="col-md-9 p-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('overlay_color') }}" name="overlay_color" id="overlay_color" placeholder="#000000">
                                    <input type="color" class="form-control" id="overlay_color_picker" value="#000000">
                                </div>
                                <small class="form-text text-muted">Warna overlay yang akan diterapkan di atas gambar background</small>
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="text_color" class="col-md-3 col-form-label text-wrap"><b>Opacity Overlay</b></label>
                            <div class="col-md-9 p-0">
                                <div class="input-group">
                                    <label for="overlay_opacity" class="text-wrap"><b>Opacity Overlay</b></label>
                                    <input type="number" class="form-control input-full" value="{{ old('overlay_opacity') }}" name="overlay_opacity" id="overlay_opacity" min="0" max="1" step="0.01" placeholder="0.5">
                                    <small class="form-text text-muted">Nilai antara 0 (transparan) hingga 1 (tidak transparan)</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="text_color" class="col-md-3 col-form-label text-wrap"><b>Status</b></label>
                            <div class="col-md-9 p-0">
                               <select class="form-control input-full" name="is_active" id="is_active">
                                    <option value="1" {{ old('is_active', 1) ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('is_active', 0) ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('cms.website-header.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
                        <button class="btn btn-success float-end" name="submit"><span class="icon-check"></span> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@include('cms.page.files.custom-url')
@include('cms.page.files.upload-file', ['multiple' => false, 'allow' => 'image/*'])
@endsection

@section('script')
<script>
    $(document).ready(function() {
        initMiniTinyMce('textarea#title');
        $('#removeBackground').hide();
        $('#backgroundPreview').hide();
        
    });

    $('#text_color_picker').on('input', function() {
        $('#text_color').val($(this).val());
    });

    $('#overlay_color_picker').on('input', function() {
        $('#overlay_color').val($(this).val());
        $('.overlay').css('background-color', $(this).val());
        $('.overlay').css('opacity', $('#overlay_opacity').val() || 0.5);
    });

    $('#text_color').on('input', function() {
        $('#text_color_picker').val($(this).val());
    });

    $('#overlay_color').on('input', function() {
        $('.overlay').css('background-color', $(this).val());
        $('.overlay').css('opacity', $('#overlay_opacity').val() || 0.5);
        $('#overlay_color_picker').val($(this).val());
    });

    $('#overlay_opacity').on('input', function() {
        $('.overlay').css('opacity', $(this).val());
    });

    window.addEventListener('fileUploaded', function(event) {
        var data = event.detail;
        console.log(data);
        if (data.key === 'background') {
            $('#background_path').val(data.urls[0]);
            $('#backgroundPreview').attr('src', data.urls[0]).show();
            $('#removeBackground').show();
        }
    });

    window.addEventListener('fileUrlAdded', function(event) {
        var data = event.detail;
        console.log(data);
        if (data.key === 'background') {
            $('#background_path').val(data.url);
            $('#backgroundPreview').attr('src', data.url).show();
            $('#removeBackground').show();
        }
    });

    $('#removeBackground').on('click', function() {
        $('#background_path').val('');
        $('#backgroundPreview').hide();
        $(this).hide();
    });
</script>
@endsection

