@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Website Cover</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('cms.website-cover.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Website Cover</a>
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
                                    <th>Judul</th>
                                    <th>Sub Judul</th>
                                    <th>Gambar</th>
                                    <th>Background</th>
                                    <th>Urutan</th> 
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($website_cover as $wc)
                                <tr>
                                    <td>{{ $wc->title }}</td>
                                    <td>{{ $wc->subtitle }}</td>
                                    <td><img src="{{ asset($wc->image) }}" alt="{{ $wc->title }}" class="img-fluid" /></td>
                                    <td><img src="{{ asset($wc->background_image) }}" alt="{{ $wc->title }}" class="img-fluid" /></td>
                                    <td>{{ $wc->order }}</td>
                                    <td>
                                        {{-- <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.website-cover.edit', $wc->id) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.website-cover.delete', $wc->id) }}', 'Anda yakin akan menghapus website cover ini?')"><span class="icon-trash"></span></a> --}}
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
