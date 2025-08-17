@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Website Cover</h3>
            <small class="text-muted fw-normal mb-0">Kelola website cover untuk halaman depan website. <b>Drag dan drop</b> untuk mengatur urutan.</small>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            @can('Website Cover.Kelola Website Cover')
            <a class="btn btn-info" id="saveOrder"><i class="fas fa-save"></i> Simpan Urutan</a>
            <a href="{{ route('cms.website-cover.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Website Cover</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="coverForm" action="{{ route('cms.website-cover.save-order') }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-striped" width="100%" id="coverTable">
                                <thead> 
                                    <tr class="table-primary">
                                        <th>Judul</th>
                                        <th>Status</th>
                                        @can('Website Cover.Kelola Website Cover')
                                        <th>Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($website_cover as $wc)
                                    
                                    <tr>
                                        <input type="hidden" name="id[]" value="{{ $wc->id }}">
                                        <td>{!! $wc->title !!}</td>
                                        <td>
                                            @if($wc->is_active)
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        @can('Website Cover.Kelola Website Cover')
                                        <td>
                                            <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.website-cover.edit', $wc->id) }}"><span class="icon-pencil"></span></a>
                                            <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.website-cover.delete', $wc->id) }}', 'Anda yakin akan menghapus website cover ini?')"><span class="icon-trash"></span></a>
                                        </td>
                                        @endcan
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    let sortableCover = new Sortable(document.querySelector('#coverTable tbody'));

    $('#saveOrder').on('click', function(e) {
        e.preventDefault();
        $('#coverForm').submit();
    });
</script>
@endsection