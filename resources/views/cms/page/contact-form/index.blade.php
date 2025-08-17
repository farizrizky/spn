@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Form Kontak</h3>
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
                                    <th>Tanggal Masuk</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Subjek</th>
                                    <th>Status</th>
                                    @can('Contact Form.Kelola Form Kontak')
                                    <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact_form as $cf)
                                <tr>
                                    <td>{{ DateHelper::fullDateFormat($cf->created_at) }}</td>
                                    <td>{{ $cf->name }}</td>
                                    <td>{{ $cf->email }}</td>
                                    <td>{{ $cf->phone }}</td>
                                    <td>{{ $cf->subject }}</td>
                                    <td>
                                        @if($cf->is_read)
                                            <span class="badge bg-success">Dibaca</span>
                                        @else
                                            <span class="badge bg-warning">Belum Dibaca</span>
                                        @endif
                                    </td>
                                    @can('Contact Form.Kelola Form Kontak')
                                    <td>
                                        <a class="btn btn-info btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" href="{{ route('cms.contact-form.detail', $cf->id) }}"><span class="icon-eye"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.contact-form.delete', $cf->id) }}', 'Anda yakin akan menghapus pesan ini?')"><span class="icon-trash"></span></a>
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
