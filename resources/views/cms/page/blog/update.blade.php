@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ubah Blog</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" id="saveBlog" class="btn btn-success"><i class="fas fa-save"></i> Simpan</a>
        </div>
    </div>
    <form method="POST" action="{{ route('cms.blog.update', $blog->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="name"><b>Judul</b></label>
                            <input type="text" class="form-control input-full" value="{{ $blog->title }}" name="title" id="title" required>
                            <div class="invalid-feedback">Judul harus diisi</div>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug"><b>Slug</b></label>
                            <input type="text" class="form-control input-full" value="{{ $blog->slug }}" name="slug" id="slug" required>
                            <div class="invalid-feedback">Slug harus diisi</div>
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description"><b>Konten</b></label>
                            <textarea class="form-control" name="content" id="editor">{{ $blog->content }}</textarea>
                            <div class="invalid-feedback">Konten harus diisi</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                         <h6><strong>SEO</strong></h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="meta_description"><b>Meta Deskripsi</b> (<span class="char-count">{{ strlen($blog->meta_description) }}</span>/160)</label>
                            <textarea class="form-control" name="meta_description" id="meta_description">{{ $blog->meta_description }}</textarea>
                            <div class="invalid-feedback">Meta deskripsi harus diisi</div>
                            @error('meta_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="date"><b>Tanggal</b></label>
                            <input type="date" class="form-control input-full datepicker" value="{{ $blog->date }}" name="date" id="date" required>
                            <div class="invalid-feedback">Tanggal harus diisi</div>
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status"><b>Status</b></label>
                            <select class="form-select form-control" name="status" id="status" required>
                                <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>Publish</option>
                            </select>
                            <div class="invalid-feedback">Status harus diisi</div>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="blog_category_id"><b>Kategori Blog</b></label>
                            <select class="form-select form-control select2" style="width: 100%" name="blog_category" required>
                                <option value="">Pilih Kategori Blog</option>
                                @foreach ($blog_category as $c)
                                    <option value="{{ $c->id }}" {{ $blog->blog_category == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tag"><b>Tag</b></label>
                            <select style="width: 100%" name="tag[]" id="selectTag" multiple>
                                @foreach ($tag as $t)
                                    <option value="{{ $t->id }}" {{ in_array($t->id, $blog->blogTag->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $t->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6><strong>Gambar</strong>
                            <div class="btn-group float-end" role="group" aria-label="Basic example">
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
                        </h6>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="image_path" id="image_path" value="{{ $blog->image_path }}">
                        <h6 class="text-center" id="noImage">Belum Ada Gambar</h6>
                        <img id="imagePreview" src="{{ $blog->image_path }}" class="img-fluid mb-3" style="width: 100%; object-fit: cover;">
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

    $(document).ready(function(){
        if($('#image_path').val()) {
            $('#noImage').hide();
            $('#removeImage').show();
        }
        else {
            $('#noImage').show();
            $('#removeImage').hide();
        }

        $('#selectTag').select2({
            placeholder: "Pilih Tag",
            allowClear: true,
            tags: true,
            tokenSeparators: [','],
            createTag: function (params) {
                var term = $.trim(params.term);
                if (term === '') {
                    return null;
                }
                return {
                    id: term,
                    text: term,
                    newTag: true
                }
            }
        });
    });
   
    $('#saveBlog').on('click', function() {
        if ($('form').get(0).checkValidity()) {
            $('form').submit();
        } else {
            $('form').addClass('was-validated');
        }
    });

    $('#title').on('input', function() {
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
                $('#imagePreview').attr('src', url);
                $('#image_path').val(url);
                $('#noImage').hide();
                $('#removeImage').show();
            }
        }
    });

    window.addEventListener('fileUrlAdded', function (e) {
        const url = e.detail.url;
        if (url) {
            $('#imagePreview').attr('src', url);
            $('#image_path').val(url);
            $('#noImage').hide();
            $('#removeImage').show();
        }
    });

    $('#removeImage').on('click', function () {
        $('#imagePreview').attr('src', '');
        $('#image_path').val('');
        $('#noImage').show();
        $('#removeImage').hide();
    });

    $('.char-count').text($('#meta_description').val().length);

    $('#meta_description').on('input', function () {
        var count = $(this).val().length;
        $('.char-count').text(count);
        if (count > 160) {
            //can't type anymore
            $(this).val($(this).val().substring(0, 160));
        }
       
    });

</script>
@endsection
