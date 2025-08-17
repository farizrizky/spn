@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Role</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            @can('Role.Kelola Role')
            <a href="{{ route('cms.role.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Role</a>
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
                                    <th>Role</th>
                                    @can('Role.Kelola Role')
                                    <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role as $r)
                                <tr>
                                    <td>{{ $r->name }}</td>
                                    @can('Role.Kelola Role')
                                    <td>
                                        @if($r->name == 'Administrator')
                                            Tidak dapat diubah / dihapus
                                        @else
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.role.edit', $r->id) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.role.delete', $r->id) }}', 'Anda yakin akan menghapus role ini?')"><span class="icon-trash"></span></a>
                                        @endif
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
