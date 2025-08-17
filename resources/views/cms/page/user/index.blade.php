@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">User</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            @can('User.Kelola User')
            <a href="{{ route('cms.user.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat User</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-striped" width="100%">
                            <thead> 
                                <tr class="table-primary">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    @can('User.Kelola User')
                                    <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->getRoleNames()->implode(', ') }}</td>
                                    @can('User.Kelola User')
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.user.edit', $u->id) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.user.delete', $u->id) }}', 'Anda yakin akan menghapus user ini?')"><span class="icon-trash"></span></a>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
