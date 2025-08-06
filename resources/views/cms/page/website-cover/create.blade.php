@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Website Cover Baru</h3>
        </div>
    </div>
    <form method="POST" action="#" class="needs-validation" novalidate enctype="multipart/form-data"></form>
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Judul</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="text-wrap"><b>Judul</b></label>
                            <textarea class="form-control input-full" name="title" id="title" rows="3" required>{{ old('title') }}</textarea>
                            <div class="invalid-feedback">Judul harus diisi</div>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="text-wrap"><b>Sub Judul</b></label>
                            <input type="text" class="form-control input-full" value="{{ old('subtitle') }}" name="subtitle" id="subtitle">
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="text-wrap"><b>Warna Sub Judul</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ old('subtitle_color') }}" name="subtitle_color" id="subtitle_color" placeholder="#000000">
                                <input type="color" class="form-control" id="subtitle_color_picker" value="#000000">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Background</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="text-wrap"><b>Gambar Background</b></label>
                            <input type="hidden" name="background_path" id="background_path" value="" required>
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
                            <img id="backgroundPreview" class="img-fluid mt-2" src="" alt="Preview Gambar" />
                        </div>
                    </div>
                </div>

                 <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gambar</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="text-wrap"><b>Gambar</b></label>
                            <input type="hidden" name="image_path" id="image_path" value="" required>
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

    $('#subtitle_color_picker').on('input', function() {
        $('#subtitle_color').val($(this).val());
    });

    window.addEventListener('fileUploaded', function(event) {
        var data = event.detail;
        console.log(data);
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
        console.log(data);
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

