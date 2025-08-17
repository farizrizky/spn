@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ubah Password</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cms.user.password.update', $user->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-inline row">
                            <label for="current_password" class="col-md-3 col-form-label text-wrap"><b>Password Lama</b></label>
                            <div class="col-md-9 p-0">
                                <input type="password" class="form-control input-full" name="current_password" id="current_password" required>
                                <div class="invalid-feedback">Password lama harus diisi</div>
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="new_password" class="col-md-3 col-form-label text-wrap"><b>Password Baru</b></label>
                            <div class="col-md-9 p-0">
                                <input type="password" class="form-control input-full" name="new_password" id="new_password" required>
                                <div class="invalid-feedback">Password baru harus diisi</div>
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="new_password_confirmation" class="col-md-3 col-form-label text-wrap"><b>Konfirmasi Password Baru</b></label>
                            <div class="col-md-9 p-0">
                                <input type="password" class="form-control input-full" name="new_password_confirmation" id="new_password_confirmation" required>
                                <div class="invalid-feedback">Konfirmasi password baru harus diisi</div>
                                @error('new_password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <button class="btn btn-success float-end" id="submit" name="submit"><span class="icon-check"></span> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#submit').on('click', function(e) {
        e.preventDefault();
        let password = $('#new_password').val();
        let confirmation = $('#new_password_confirmation').val();
        if (password !== confirmation) {
            alert("Password dan Konfirmasi Password tidak cocok");
            return;
        }
        $('form').submit();
    });
</script>
@endsection

