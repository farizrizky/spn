@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ubah Produk</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" id="saveProduct" class="btn btn-success"><i class="fas fa-save"></i> Simpan</a>
        </div>
    </div>
    <form method="POST" action="{{ route('cms.product.update', $product->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h6><strong>Informasi Produk</strong></h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"><b>Nama Produk</b></label>
                            <input type="text" class="form-control input-full" value="{{ $product->name }}" name="name" id="name" required>
                            <div class="invalid-feedback">Nama produk harus diisi</div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug"><b>Slug</b></label>
                            <input type="text" class="form-control input-full" value="{{ $product->slug }}" name="slug" id="slug" required>
                            <div class="invalid-feedback">Slug harus diisi</div>
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description"><b>Deskripsi</b></label>
                            <textarea class="form-control" name="description" id="editor">
                                {{ $product->description }}
                            </textarea>
                            <div class="invalid-feedback">Deskripsi harus diisi</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h6><strong>Status</strong></h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select class="form-select form-control" name="status" id="status" required>
                                <option value="draft" {{ $product->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ $product->status == 'published' ? 'selected' : '' }}>Publish</option>
                            </select>
                            <div class="invalid-feedback">Status harus diisi</div>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6><strong>Gambar</strong>
                            <div class="btn-group float-end" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary btn-sm float-end" data-allow="image/*" id="openFileUpload">
                                    <i class="fa fa-upload"></i> Upload Gambar
                                </button>
                                <button type="button" class="btn btn-info btn-sm float-end" data-allow="image/*" id="openAddImageFromUrl">
                                    <i class="fa fa-link"></i> Dari URL
                                </button>
                            </div>
                        </h6>
                    </div>
                    <div class="card-body">
                        <small><i>Tekan dan tahan untuk memindahkan item</i></small>
                        <table class="table table-bordered mt-2" id="imageTable">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th width="100">Hapus</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6><strong>Kategori Produk</strong></h6>
                    </div>
                    <div class="card-body">
                        <select style="width: 100%" name="type[]" id="selectType" multiple>
                            @foreach ($type as $t)
                                <option value="{{ $t->id }}" {{ in_array($t->id, $product->productType->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6><strong>Informasi Tambahan</strong>
                            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addAdditionalInformation">
                                <i class="fa fa-plus"></i> Tambah Informasi
                            </button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <small><i>Tekan dan tahan untuk memindahkan item</i></small>
                        <table class="table table-bordered mt-2" id="informationTable">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th width="100">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="addImageFromUrl" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Gambar dari URL</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="text" id="imageUrl" name="imageUrl" class="form-control" placeholder="Masukkan URL Gambar">
                <div class="invalid-feedback">URL gambar harus diisi</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="addUrl">
                    <i class="fa fa-upload"></i> Tambah
                </button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addAdditionalInformation" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Informasi Tambahan </h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="additionalInfoId" name="additionalInfoId" value="">
                <input type="text" id="additionalInfoTitle" name="title" class="form-control mb-3" value="" placeholder="Masukkan Judul Informasi">
                <div class="invalid-feedback">Judul informasi harus diisi</div>
                <textarea id="additionalInfoContent" name="information" class="form-control mt-2" placeholder="Masukkan Konten Informasi"></textarea>
                <div class="invalid-feedback">Konten informasi harus diisi</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="saveInformation">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fa fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@include('cms.partial.upload-file', ['multiple' => true, 'allow' => 'image/*'])
@endsection

@section('script')
<script>
    let sortableImage = new Sortable(document.querySelector('#imageTable tbody'));
    let sortableInformation = new Sortable(document.querySelector('#informationTable tbody'));

    let image = [];
    let specification = {};
    let uploadedFiles = "{{ $product->productImage->pluck('image_path')->implode(',') }}";
    let additionalInformation = {!! json_encode($product->productAdditionalInformation()->pluck('information', 'id')->toArray()) !!};
    let additionalInformationTitles = {!! json_encode($product->productAdditionalInformation()->pluck('title', 'id')->toArray()) !!};

    for (let key in additionalInformation) {
        additionalInformation[key] = {
            title: additionalInformationTitles[key],
            content: additionalInformation[key]
        };
    }

    if (uploadedFiles) {
        uploadedFiles.split(',').forEach(url => {
            if (url) {
                image.push(url);
            }
        });
    }

    $(document).ready(function(){
        renderImageTable();
        renderAdditionalInformation();

        $('#selectType').select2({
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
                newTag: true // add additional parameters
                }
            }
        });
    });

    $('#saveProduct').on('click', function() {
        if ($('form').get(0).checkValidity()) {
            $('form').submit();
        } else {
            $('form').addClass('was-validated');
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
        const uploaded = e.detail.urls; // array of URLs

        if (uploaded.length > 0) {
            // Update the table with the uploaded image
            var selected = "checked";
            for (let i = 0; i < uploaded.length; i++) {
                let url = uploaded[i];
                image.push(url);
            }
        }
        renderImageTable();
    });

    $('#openAddImageFromUrl').on('click', function () {
        $('#addImageFromUrl').modal('show');
        $('#imageUrl').val(''); // reset input
        $('#imagePreview').html('');
    });

    $('#addUrl').on('click', function () {
        let url = $('#imageUrl').val();
        image.push(url);
        renderImageTable();
    });

    function renderImageTable() {
        let tbody = $('#imageTable tbody');
        tbody.empty();
        if (image.length === 0) {
            tbody.append('<tr><td colspan="2" class="text-center">Tidak ada gambar</td></tr>');
            return;
        }
        image.forEach((img, index) => {
            tbody.append(`
                <tr>
                    <td>
                        <input type="hidden" name="images[]" value="${img}">
                        <img src="${img}" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeImage(${index})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `);
        });
    }

    function removeImage(index) {
        image.splice(index, 1);
        renderImageTable();
    }

    $('#addAdditionalInformation').on('shown.bs.modal', function (event) {
        initTinyMce('textarea#additionalInfoContent');
        $('#additionalInfoTitle').val('');
        $('#additionalInfoId').val('');
        tinymce.get('additionalInfoContent').setContent('');
        const button = event.relatedTarget;
        var id = $(button).data('id');

        if(id !== undefined && additionalInformation[id]) {
            $('#additionalInfoId').val(id);
            $('#additionalInfoTitle').val(additionalInformation[id].title);
            tinymce.get('additionalInfoContent').setContent(additionalInformation[id].content);
        }
        
    });

    $('#saveInformation').on('click', function () {
        let title = $('#additionalInfoTitle').val();
        let content = tinymce.get('additionalInfoContent').getContent();
        let id = $('#additionalInfoId').val();
        
        if (title && content) {
            if (additionalInformation[id]) {
                additionalInformation[id] = {};
                additionalInformation[id].title = title;
                additionalInformation[id].content = content;
            } else {
                id = 'info-' + Date.now();
                additionalInformation[id] = { title: title, content: content };
            }
            renderAdditionalInformation();
            $('#addAdditionalInformation').modal('hide');
            $('#additionalInfoTitle').val('');
            $('#additionalInfoContent').val('');
            $('#additionalInfoId').val('');
        } else {
            alert('Judul dan Konten harus diisi');
        }
         console.log(additionalInformation)
    });

    function renderAdditionalInformation() {
        let tbody = $('#informationTable tbody');
        tbody.empty();
        if (Object.keys(additionalInformation).length === 0) {
            tbody.append('<tr><td colspan="3" class="text-center">Belum ada informasi tambahan</td></tr>');
            return;
        }
        Object.keys(additionalInformation).forEach((key) => {
            let info = additionalInformation[key];
            tbody.append(`
                <tr>
                    <td>
                        <input type="hidden" name="additional_information[${key}][title]" value="${info.title}">
                        <input type="hidden" name="additional_information[${key}][information]" value='${info.content}'>
                        ${info.title}
                        
                    </td>
                    <td style="width: 150px;">
                        <div class="btn-group float-end" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success btn-sm float-end" data-id="${key}" data-bs-toggle="modal" data-bs-target="#addAdditionalInformation">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm float-end" onclick="removeAdditionalInformation('${key}')">
                            <i class="fa fa-trash"></i>
                        </button>
                        </div>
                    </td>
                </tr>
            `);
        });
    }

    function removeAdditionalInformation(key) {
        delete additionalInformation[key];
        renderAdditionalInformation();
    }
</script>
@endsection
