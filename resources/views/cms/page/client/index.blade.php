@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Client</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('cms.client.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Client</a>
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
                                    <th>Client</th>
                                    <th>Gambar / Logo</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client as $c)
                                <tr>
                                    <td>{{ $c->name }}</td>
                                    <td>
                                        <img src="{{ $c->image_path }}" alt="{{ $c->name }}" class="img-fluid" style="max-width: 100px;">
                                    </td>
                                    <td>
                                        <span class="badge {{ $c->is_active ? 'bg-success' : 'bg-danger' }}">{{ $c->is_active ? 'Aktif' : 'Tidak Aktif' }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.client.edit', $c->id) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.client.delete', $c->id) }}', 'Anda yakin akan menghapus client ini?')"><span class="icon-trash"></span></a>
                                    </td>
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
