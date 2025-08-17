@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ubah Permission</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cms.permission.update', $permission->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-inline row">
                            <label for="feature" class="col-md-3 col-form-label text-wrap"><b>Fitur</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ $feature }}" name="feature" id="feature" required>
                                <div class="invalid-feedback">Fitur harus diisi</div>
                                @error('feature')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="access" class="col-md-3 col-form-label text-wrap"><b>Akses</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ $access }}" name="access" id="access" required>
                                <div class="invalid-feedback">Akses harus diisi</div>
                                @error('access')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <a href="{{ route('cms.permission.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
                    <button class="btn btn-success float-end" name="submit"><span class="icon-check"></span> Simpan</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection

