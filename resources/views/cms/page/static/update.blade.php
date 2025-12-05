@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ubah Halaman Statis</h3>
        </div>
    </div>
    <form method="POST" action="{{ route('cms.static.update', $static->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                         <h6><strong>SEO</strong></h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"><b>Judul</b></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $static->title }}" required>
                            <div class="invalid-feedback">
                                Judul harus diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_description"><b>Meta Deskripsi</b> (<span class="char-count">{{ strlen($static->meta_description) }}</span>/200)</label>
                            <textarea class="form-control" name="meta_description" id="meta_description">{{ $static->meta_description }}</textarea>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="{{ route('cms.static.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
                        <button class="btn btn-success float-end" name="submit"><span class="icon-check"></span> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $('.char-count').text($('#meta_description').val().length);

    $('#meta_description').on('input', function () {
        var count = $(this).val().length;
        $('.char-count').text(count);
        if (count > 200) {
            //can't type anymore
            $(this).val($(this).val().substring(0, 200));
        }
       
    });
</script>
@endsection
