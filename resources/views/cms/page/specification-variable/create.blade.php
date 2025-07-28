@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Variabel Spesifikasi Baru</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cms.specification-variable.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-inline row">
                            <label for="name" class="col-md-3 col-form-label text-wrap"><b>Variabel Spesifikasi</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ old('name') }}" name="name" id="name">
                                <div class="invalid-feedback">Variabel spesifikasi harus diisi</div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="description" class="col-md-3 col-form-label text-wrap"><b>Deskripsi</b></label>
                            <div class="col-md-9 p-0">
                                <textarea class="form-control" name="description" id="description"></textarea>
                                <div class="invalid-feedback">Deskripsi harus diisi</div>
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <a href="{{ route('cms.specification-variable.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
                    <button class="btn btn-success float-end" name="submit"><span class="icon-check"></span> Simpan</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection

