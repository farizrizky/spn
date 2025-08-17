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
            <h3 class="fw-bold mb-3">Website Cover Baru</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" id="saveCover" class="btn btn-success"><i class="fas fa-save"></i> Simpan</a>
        </div>
    </div>
    <form method="POST" action="{{ route('cms.website-cover.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="text-wrap"><b>Judul</b></label>
                            <input type="text" class="form-control input-full" value="{{ old('title') }}" name="title" id="title" required> 
                            <div class="invalid-feedback">Judul harus diisi</div>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title_color" class="text-wrap"><b>Warna Judul</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="#FFFFFF" name="title_color" id="title_color" placeholder="#FFFFFF">
                                <input type="color" class="form-control" id="title_color_picker" value="#FFFFFF">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title_size" class="text-wrap"><b>Ukuran Judul</b></label>
                            <select class="form-control input-full" name="title_size" id="title_size">
                                <option value="small" {{ old('title_size') == 'small' ? 'selected' : '' }}>Kecil</option>
                                <option value="medium" {{ old('title_size') == 'medium' ? 'selected' : '' }}>Sedang</option>
                                <option value="large" {{ old('title_size') == 'large' ? 'selected' : '' }}>Besar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="text-wrap"><b>Sub Judul</b></label>
                            <input type="text" class="form-control input-full" value="{{ old('subtitle') }}" name="subtitle" id="subtitle">
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="text-wrap"><b>Warna Sub Judul</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="#FFFFFF" name="subtitle_color" id="subtitle_color" placeholder="#FFFFFF">
                                <input type="color" class="form-control" id="subtitle_color_picker" value="#FFFFFF">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paragraph" class="text-wrap"><b>Paragraf</b></label>
                            <textarea class="form-control input-full" name="paragraph" id="paragraph">{{ old('paragraph') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="paragraph_color" class="text-wrap"><b>Warna Paragraf</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="#FFFFFF" name="paragraph_color" id="paragraph_color" placeholder="#FFFFFF">
                                <input type="color" class="form-control" id="paragraph_color_picker" value="#FFFFFF">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title_color" class="text-wrap"><b>Posisi Judul</b></label>
                            <select class="form-control input-full" name="title_position" id="title_position">
                                <option value="left" {{ old('title_position') == 'left' ? 'selected' : '' }}>Kiri</option>
                                <option value="right" {{ old('title_position') == 'right' ? 'selected' : '' }}>Kanan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="button_type" class="text-wrap"><b>Tipe Tombol</b></label>
                            <select class="form-control input-full" name="button_type" id="button_type">
                                <option value="none" {{ old('button_type') == 'none' ? 'selected' : '' }}>Tidak Ada</option>
                                <option value="border" {{ old('button_type') == 'border' ? 'selected' : '' }}>Border</option>
                                <option value="filled" {{ old('button_type') == 'filled' ? 'selected' : '' }}>Filled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="button_text" class="text-wrap"><b>Teks Tombol</b></label>
                            <input type="text" class="form-control input-full" value="{{ old('button_text') }}" name="button_text" id="button_text" placeholder="Selengkapnya">
                        </div>
                        <div class="form-group">
                            <label for="button_url" class="text-wrap"><b>URL Tombol</b></label>
                            <input type="text" class="form-control input-full" value="{{ old('button_url') }}" name="button_url" id="button_url" placeholder="https://example.com">
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="text-wrap"><b>Gambar Background</b></label>
                            <input type="hidden" name="background_path" id="background_path" value="">
                            <div class="btn-group float-end" role="group" id="backgroundUploadButtons">
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
                                <img id="backgroundPreview" class="img-fluid mt-2" src="" alt="Preview Gambar"/>
                                <div class="overlay"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="overlay_color" class="text-wrap"><b>Warna Overlay</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ old('overlay_color') }}" name="overlay_color" id="overlay_color" placeholder="#000000">
                                <input type="color" class="form-control" id="overlay_color_picker" value="#000000">
                            </div>
                            <small class="form-text text-muted">Warna overlay yang akan diterapkan di atas gambar background</small>
                        </div>
                        <div class="form-group">
                            <label for="overlay_opacity" class="text-wrap"><b>Opacity Overlay</b></label>
                            <input type="number" class="form-control input-full" value="{{ old('overlay_opacity') }}" name="overlay_opacity" id="overlay_opacity" min="0" max="1" step="0.01" placeholder="0.5">
                            <small class="form-text text-muted">Nilai antara 0 (transparan) hingga 1 (tidak transparan)</small>
                        </div>
                    </div>
                </div>

                 <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="text-wrap"><b>Gambar</b></label>
                            <input type="hidden" name="image_path" id="image_path" value="">
                            <div class="btn-group float-end" role="group" id="imageUploadButtons">
                                <button type="button" class="btn btn-primary btn-sm float-end openFileUpload" data-allow="image/*" data-key="image" >
                                    <i class="fa fa-upload"></i> Upload Gambar
                                </button>
                                <button type="button" class="btn btn-info btn-sm float-end openCustomUrl" data-key="image">
                                    <i class="fa fa-link"></i> Dari URL
                                </button>
                                <button type="button" class="btn btn-danger btn-sm float-end" id="removeImage">
                                    <i class="fa fa-trash"></i> Hapus Gambar
                                </button>
                            </div>
                            <hr>
                            <img id="imagePreview" class="img-fluid mt-2" src="" alt="Preview Gambar" />
                        </div>
                        <div class="form-group">
                            <label for="image_frame" class="text-wrap"><b>Frame Gambar</b></label>
                            <select class="form-control input-full" name="image_frame" id="image_frame">
                                <option value="none" {{ old('image_frame') == 'none' ? 'selected' : '' }}>Tanpa Frame</option>
                                <option value="rounded" {{ old('image_frame') == 'rounded' ? 'selected' : '' }}>Rounded</option>
                                <option value="circle" {{ old('image_frame') == 'circle' ? 'selected' : '' }}>Circle</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_image_floating" class="text-wrap"><b>Efek Gambar Bergerak</b></label>
                            <select class="form-control input-full" name="is_image_floating" id="is_image_floating">
                                <option value="0" {{ old('is_image_floating', 0) ? 'selected' : '' }}>Tidak Aktif</option>
                                <option value="1" {{ old('is_image_floating', 1) ? 'selected' : '' }}>Aktif</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="is_active" class="text-wrap"><b>Status Aktif</b></label>
                            <select class="form-control input-full" name="is_active" id="is_active">
                                <option value="1" {{ old('is_active', 1) ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active', 0) ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
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
        $('#removeImage').hide();
        $('#removeBackground').hide();
        $('#backgroundPreview').hide();
        $('#imagePreview').hide();
        
    });

     $('#saveCover').on('click', function() {
        if ($('form').get(0).checkValidity()) {
            $('form').submit();
        } else {
            $('form').addClass('was-validated');
        }
    });

    $('#title_color_picker').on('input', function() {
        $('#title_color').val($(this).val());
    });

    $('#subtitle_color_picker').on('input', function() {
        $('#subtitle_color').val($(this).val());
    });

    $('#paragraph_color_picker').on('input', function() {
        $('#paragraph_color').val($(this).val());
    });

    $('#overlay_color_picker').on('input', function() {
        $('#overlay_color').val($(this).val());
        $('.overlay').css('background-color', $(this).val());
        $('.overlay').css('opacity', $('#overlay_opacity').val() || 0.5);
    });

     $('#title_color').on('input', function() {
        $('#title_color_picker').val($(this).val());
    });

    $('#subtitle_color').on('input', function() {
        $('#subtitle_color_picker').val($(this).val());
    });

    $('#paragraph_color').on('input', function() {
        $('#paragraph_color_picker').val($(this).val());
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
        if (data.key === 'background') {
            $('#background_path').val(data.urls[0]);
            $('#backgroundPreview').attr('src', data.urls[0]).show();
            $('#removeBackground').show();
        }else if (data.key === 'image') {
            $('#image_path').val(data.urls[0]);
            $('#imagePreview').attr('src', data.urls[0]).show();
            $('#removeImage').show();
        }
    });

    window.addEventListener('fileUrlAdded', function(event) {
        var data = event.detail;
        if (data.key === 'background') {
            $('#background_path').val(data.url);
            $('#backgroundPreview').attr('src', data.url).show();
            $('#removeBackground').show();
        } else if (data.key === 'image') {
            $('#image_path').val(data.url);
            $('#imagePreview').attr('src', data.url).show();
            $('#removeImage').show();
        }
    });

    $('#removeBackground').on('click', function() {
        $('#background_path').val('');
        $('#backgroundPreview').hide();
        $(this).hide();
    });

    $('#removeImage').on('click', function() {
        $('#image_path').val('');
        $('#imagePreview').hide();
        $(this).hide();
    });
    
</script>
@endsection

