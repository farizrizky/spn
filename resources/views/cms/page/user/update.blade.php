@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ubah User</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a onclick="confirmAlert('{{ route('cms.user.reset-password', $user->id) }}', 'Anda yakin akan mereset password user ini?')" class="btn btn-info"><i class="fas fa-key"></i> Reset Password</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cms.user.update', $user->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-inline row">
                            <label for="name" class="col-md-3 col-form-label text-wrap"><b>Nama</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ $user->name }}" name="name" id="name" required>
                                <div class="invalid-feedback">Nama harus diisi</div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="email" class="col-md-3 col-form-label text-wrap"><b>Email</b></label>
                            <div class="col-md-9 p-0">
                                <input type="email" class="form-control input-full" value="{{ $user->email }}" name="email" id="email" required>
                                <div class="invalid-feedback">Email harus diisi</div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline row">
                            <label for="role" class="col-md-3 col-form-label text-wrap"><b>Role</b></label>
                            <div class="col-md-9 p-0">
                                <select class="form-control input-full" name="role" id="role"required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" @if(in_array($role->name, $user->roles->pluck('name')->toArray())) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Role harus dipilih</div>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <a href="{{ route('cms.user.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
                    <button class="btn btn-success float-end" name="submit"><span class="icon-check"></span> Simpan</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection


