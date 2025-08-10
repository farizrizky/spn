@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Produk</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('cms.product.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Produk</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-bordered table-striped" width="100%">
                            <thead> 
                                <tr class="table-primary">
                                    <th>Terakhir Diperbarui</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Jumlah Dilihat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $p)
                                <tr>
                                    <td>{{ $p->updated_at }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>
                                        @if($p->productType->isNotEmpty())
                                            {{ implode(', ', $p->productType->pluck('name')->toArray()) }}
                                        @else
                                            <a class="text-muted">Tidak ada kategori</a>
                                        @endif
                                    </td>
                                    <td>{{ $p->status == 'published' ? 'Published' : 'Draft' }}</td>
                                    <td>{{ $p->view_count }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.product.edit', $p->id) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.product.delete', $p->id) }}', 'Anda yakin akan menghapus produk ini?')"><span class="icon-trash"></span></a>
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

@section('script')
<script>
    $(document).ready(function() {
        $('#basic-datatable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>
@endsection

