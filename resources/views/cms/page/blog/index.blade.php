@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Blog</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            @canany(['Blog.Kelola Blog', 'Blog.Kelola Blog Sendiri'])
            <a href="{{ route('cms.blog.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Blog</a>
            @endcanany
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
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Jumlah Dilihat</th>
                                    @canany(['Blog.Kelola Blog', 'Blog.Kelola Blog Sendiri'])
                                    <th>Aksi</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blog as $b)
                                <tr>
                                    <td>{{ $b->date }}</td>
                                    <td>{{ $b->title }}</td>
                                    <td>{{ $b->blogCategory?->name }}</td>
                                    <td>{{ $b->status == 'published' ? 'Published' : 'Draft' }}</td>
                                    <td>{{ $b->view_count }}</td>
                                    @canany(['Blog.Kelola Blog', 'Blog.Kelola Blog Sendiri'])
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" href="{{ route('cms.blog.edit', $b->id) }}"><span class="icon-pencil"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.blog.delete', $b->id) }}', 'Anda yakin akan menghapus blog ini?')"><span class="icon-trash"></span></a>
                                    </td>
                                    @endcanany
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