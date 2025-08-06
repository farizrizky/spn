@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ubah Kategori Produk</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cms.type.update', $type->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-inline row">
                            <label for="name" class="col-md-3 col-form-label text-wrap"><b>Nama Kategori</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ $type->name }}" name="name" id="name" required>
                                <div class="invalid-feedback">Nama kategori harus diisi</div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="slug" class="col-md-3 col-form-label text-wrap"><b>Slug</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ $type->slug }}" name="slug" id="slug" required>
                                <div class="invalid-feedback">Slug harus diisi</div>
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="description" class="col-md-3 col-form-label text-wrap"><b>Deskripsi</b></label>
                            <div class="col-md-9 p-0">
                                 <textarea class="form-control" name="description" id="editor">{{ $type->description }}</textarea>
                                <div class="invalid-feedback">Deskripsi harus diisi</div>
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="image" class="col-md-3 col-form-label text-wrap"><b>Gambar</b></label>
                            <div class="col-md-9 p-0">
                                <input type="hidden" name="image_path" id="image_path" value="{{ $type->image_path }}" required>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-sm float-end openFileUpload" data-allow="image/*">
                                        <i class="fa fa-upload"></i> Upload Gambar
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm float-end openCustomUrl">
                                        <i class="fa fa-link"></i> Dari URL
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm float-end" id="removeImage">
                                        <i class="fa fa-trash"></i> Hapus Gambar
                                    </button>
                                </div>
                                <hr>
                                <img id="imagePreview" class="img-fluid mt-2" src="{{ $type->image_path }}" alt="Preview Gambar" />
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <a href="{{ route('cms.type.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
                    <button class="btn btn-success float-end" name="submit"><span class="icon-check"></span> Simpan</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@include('cms.page.files.custom-url')
@include('cms.page.files.upload-file', ['multiple' => false, 'allow' => 'image/*'])
@endsection

@section('script')
<script>
    $(document).ready(function(){
        if($('#image_path').val()) {
            $('#imagePreview').show();
            $('#removeImage').show();
        } else {
            $('#imagePreview').hide();
            $('#imagePreview').hide();
        }
    });

    $('#name').on('input', function() {
        var slug = slugify($(this).val());
        $('#slug').val(slug);
    });

    $('#slug').on('input', function() {
        var slug = slugify($(this).val());
        $(this).val(slug);
    });

    window.addEventListener('fileUploaded', function (e) {
        const uploaded = e.detail.urls;

        if (uploaded.length > 0) {

            for (let i = 0; i < uploaded.length; i++) {
                let url = uploaded[i];
                $('#imagePreview').attr('src', url).show();
                $('#image_path').val(url);
                $('#noImage').hide();
                $('#removeImage').show();
            }
        }
    });

    window.addEventListener('fileUrlAdded', function (e) {
        var url = e.detail.url;
        if (url) {
            $('#image_path').val(url);
            $('#imagePreview').attr('src', url).show();
            $('#removeImage').show();
        }
    });

    $('#removeImage').on('click', function() {
        $('#image_path').val('');
        $('#imagePreview').hide();
        $(this).hide();
    });
</script>
@endsection

