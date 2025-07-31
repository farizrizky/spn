@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Data Kontak Baru</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cms.contact-data.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-inline row">
                            <label for="name" class="col-md-3 col-form-label text-wrap"><b>Nama Kontak</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ old('name') }}" name="name" id="name" required>
                                <div class="invalid-feedback">Nama kontak harus diisi</div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="slug" class="col-md-3 col-form-label text-wrap"><b>Nilai</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ old('value') }}" name="value" id="value">
                                <div class="invalid-feedback">Nilai harus diisi</div>
                                @error('value')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="url" class="col-md-3 col-form-label text-wrap"><b>URL</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ old('url') }}" name="url" id="url">
                                <div class="invalid-feedback">URL harus diisi jika ada</div>
                                @error('url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="icon" class="col-md-3 col-form-label text-wrap"><b>Ikon</b></label>
                            <div class="col-md-9 p-0">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{ old('icon') }}" name="icon" id="icon">
                                    <a class="input-group-text"></a>
                                    <div class="invalid-feedback">Ikon harus diisi jika ada</div>
                                    @error('icon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <a href="{{ route('cms.contact-data.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
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
    $('#icon').on('input', function() {
        var icon = $(this).val();
        $(this).next('a').html('<i class="' + icon + '"></i>');
    });
</script>
@endsection