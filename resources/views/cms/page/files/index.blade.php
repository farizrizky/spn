@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">File</h3>
            <select class="form-select form-control" onchange="if(this.value) location = this.value;" id="fileType">
                <option value="">--- Pilih Tipe File ---</option>
                <option value="{{ route('cms.file') }}">Semua</option>
                <option value="{{ route('cms.file', ['type' => 'image']) }}" @if($type === 'image') selected @endif>Gambar</option>
                <option value="{{ route('cms.file', ['type' => 'video']) }}" @if($type === 'video') selected @endif>Video</option>
                <option value="{{ route('cms.file', ['type' => 'document']) }}" @if($type === 'document') selected @endif>Dokumen</option>
                <option value="{{ route('cms.file', ['type' => 'compressed']) }}" @if($type === 'compressed') selected @endif>Arsip</option>
                <option value="{{ route('cms.file', ['type' => 'other']) }}" @if($type === 'other') selected @endif>Lainnya</option>
            </select>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a data-allow="*" id="openFileUpload" class="btn btn-primary"><i class="fas fa-plus"></i> Upload File</a>
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
                                    <th>Tanggal Upload</th>
                                    <th>Nama File</th>
                                    <th>Preview</th>
                                    <th>Type</th>
                                    <th>Ukuran</th>
                                    <th>Path</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $f)
                                <tr>
                                    <td>{{ $f->created_at }}</td>
                                    <td>{{ $f->name }}</td>
                                    <td>
                                        @if($f->type == 'image')
                                        <a href="{{ asset('storage/'.$f->path) }}" target="_blank">
                                            <img src="{{ asset('storage/'.$f->path) }}" alt="{{ $f->name }}" class="img-thumbnail" style="max-width: 100px;" data-fancybox="gallery">
                                        </a>
                                        @elseif($f->type == 'video')
                                            <video controls style="max-width: 100px;">
                                                <source src="{{ asset('storage/'.$f->path) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <a class="btn btn-primary btn-sm text-center" href="{{ asset('storage/'.$f->path) }}" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                                        @endif
                                    <td>
                                        @if($f->type == 'image')
                                            <i class="far fa-file-image"></i>
                                        @elseif($f->type == 'video')
                                            <i class="far fa-file-video"></i>
                                        @elseif($f->type == 'document')
                                            <i class="far fa-file-pdf"></i>
                                        @elseif($f->type == 'compressed')
                                            <i class="far fa-file-archive"></i>
                                        @elseif($f->type == 'other')
                                            <i class="far fa-file-alt"></i>
                                        @endif

                                        {{ ucwords($f->type) }}
                                    </td>
                                    <td>{{ number_format($f->size / 1024, 2, ',', '.') }} Kb</td>
                                    <td>{{ $f->path }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Path" onclick="copyPath('{{ asset('storage/'.$f->path) }}')"><span class="fas fa-clipboard"></span></a>
                                        <a class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="confirmAlert('{{ route('cms.file.delete', $f->id) }}', 'Anda yakin akan menghapus file ini?')"><span class="icon-trash"></span></a>
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
@include('cms.page.files.upload-file', ['multiple' => true, 'allow' => '*'])
@endsection

@section('script')
<script>
    
    window.addEventListener('fileUploadClosed', function () {
        location.reload();
    });
    

    function copyPath(value) {
        navigator.clipboard.writeText(value).then(function() {
            alert('Data sudah disalin: ' + value);
        }, function(err) {
            console.error('Data gagal disalin: ', err);
        });
    }

</script>
