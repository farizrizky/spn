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
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                    @if($type->image_path)
                                        <a href="{{ asset('storage/' . $type->image_path) }}" data-fancybox class="input-group-text">Lihat Gambar</a>
                                    @endif
                                </div>
                                <div class="invalid-feedback">Gambar harus diisi</div>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
@endsection

@section('script')
<script>
    $('#name').on('input', function() {
        var slug = slugify($(this).val());
        $('#slug').val(slug);
    });

    $('#slug').on('input', function() {
        var slug = slugify($(this).val());
        $(this).val(slug);
    });

    Fancybox.bind("[data-fancybox]", {
    // Your custom options
    });
</script>
@endsection

