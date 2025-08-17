@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Permission</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            @can('Permission.Kelola Permission')
            <a href="{{ route('cms.permission.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Permission</a>
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
                                    <th>Fitur</th>
                                    <th>Akses</th>
                                    @can('Permission.Kelola Permission')
                                    <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permission as $p)
                                <tr>
                                    <td>{{ $p['feature'] }}</td>
                                    <td>{{ $p['access'] }}</td>
                                    @can('Permission.Kelola Permission')
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.permission.edit', $p['id']) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.permission.delete', $p['id']) }}', 'Anda yakin akan menghapus permission ini?')"><span class="icon-trash"></span></a>
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
