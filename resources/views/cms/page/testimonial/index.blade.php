@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Testimonial</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('cms.testimonial.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Testimonial</a>
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
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                    <th>Gambar</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonial as $t)
                                <tr>
                                    <td>{{ $t->name }}</td>
                                    <td>{{ $t->job }}</td>
                                    <td>
                                        <img src="{{ $t->image_path }}" alt="{{ $t->name }}" class="img-fluid" style="max-width: 100px;">
                                    </td>
                                    <td>
                                        <img src="{{ $t->logo_path }}" alt="{{ $t->name }}" class="img-fluid" style="max-width: 100px;">
                                    </td>
                                    <td>
                                        <span class="badge {{ $t->is_active ? 'bg-success' : 'bg-danger' }}">{{ $t->is_active ? 'Aktif' : 'Tidak Aktif' }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.testimonial.edit', $t->id) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.testimonial.delete', $t->id) }}', 'Anda yakin akan menghapus testimonial ini?')"><span class="icon-trash"></span></a>
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
