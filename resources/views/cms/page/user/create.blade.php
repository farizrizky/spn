@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">User Baru</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cms.user.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-inline row">
                            <label for="name" class="col-md-3 col-form-label text-wrap"><b>Nama</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ old('name') }}" name="name" id="name" required>
                                <div class="invalid-feedback">Nama harus diisi</div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="email" class="col-md-3 col-form-label text-wrap"><b>Email</b></label>
                            <div class="col-md-9 p-0">
                                <input type="email" class="form-control input-full" value="{{ old('email') }}" name="email" id="email" required>
                                <div class="invalid-feedback">Email harus diisi</div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="role" class="col-md-3 col-form-label text-wrap"><b>Role</b></label>
                            <div class="col-md-9 p-0">
                                <select class="form-control input-full" name="role" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Role harus dipilih</div>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="password" class="col-md-3 col-form-label text-wrap"><b>Password</b></label>
                            <div class="col-md-9 p-0">
                                <input type="password" class="form-control input-full" name="password" id="password" required>
                                <div class="invalid-feedback">Password harus diisi</div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="password_confirmation" class="col-md-3 col-form-label text-wrap"><b>Konfirmasi Password</b></label>
                            <div class="col-md-9 p-0">
                                <input type="password" class="form-control input-full" name="password_confirmation" id="password_confirmation" required>
                                <div class="invalid-feedback">Konfirmasi Password harus diisi</div>
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="{{ route('cms.user.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
                    <button class="btn btn-success float-end" id="submit"><span class="icon-check"></span> Simpan</button>
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
        let password = $('#password').val();
        let confirmation = $('#password_confirmation').val();
        if (password !== confirmation) {
            alert("Password dan Konfirmasi Password tidak cocok");
            return;
        }
        $('form').submit();
    });
</script>
@endsection

