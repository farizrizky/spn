@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Halaman Statis</h3>
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
                                    <th>Halaman</th>
                                    <th>Judul</th>
                                    <th>Meta Deskripsi</th>
                                    <th>Dikunjungi</th>
                                    @can('Halaman Statis.Kelola Halaman Statis')
                                    <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($static as $s)
                                <tr>
                                    <td>{{ $s->page }}</td>
                                    <td>{{ $s->title }}</td>
                                    <td>{{ $s->meta_description }}</td>
                                    <td>{{ $s->view_count }}</td>
                                    @can('Halaman Statis.Kelola Halaman Statis')
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.static.edit', $s->id) }}"><span class="icon-pencil"></span></a>
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
