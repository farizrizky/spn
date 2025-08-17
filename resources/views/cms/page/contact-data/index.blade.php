@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Data Kontak</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            @can('Data Kontak.Kelola Data Kontak')
            <a href="{{ route('cms.contact-data.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Data Kontak</a>
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
                                    <th>Kontak</th>
                                    <th>Nilai</th>
                                    <th>URL</th>
                                    <th>Ikon</th>
                                    @can('Data Kontak.Kelola Data Kontak')
                                    <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactData as $cd)
                                <tr>
                                    <td>{{ $cd->name }}</td>
                                    <td>{{ $cd->value }}</td>
                                    <td>{{ $cd->url }}</td>
                                    <td>{{ $cd->icon }}</td>
                                    @can('Data Kontak.Kelola Data Kontak')
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.contact-data.edit', $cd->id) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.contact-data.delete', $cd->id) }}', 'Anda yakin akan menghapus data kontak ini?')"><span class="icon-trash"></span></a>
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
