@extends('cms.template.file-picker')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">File Picker</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive"></div>
                            <table id="basic-datatables" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Preview</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($files as $file)
                                        <tr>
                                            <td>{{ $file->name }}</td>
                                            <td><img src="{{ asset('storage/' . $file->path) }}" alt="{{ $file->name }}" data-fancybox class="img-thumbnail" width="100"></td>
                                            <td>
                                                <button class="btn btn-success" onclick="selectFile('{{ $file->url }}')">Pilih</button>
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