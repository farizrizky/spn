<div class="modal fade" id="fileupload" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="uploadForm" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload File</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if($multiple)
                    <input type="file" id="uploadInput" accept="{{ $allow }}" name="files[]" multiple class="form-control">
                    <div id="uploadFeedback" class="mt-3"></div>
                    @else
                    <input type="file" id="uploadInput" accept="{{ $allow }}" name="file" class="form-control">
                    <div id="uploadFeedback" class="mt-3"></div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="uploadFileButton"><i class="fa fa-upload"></i> Upload</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="closeFileUpload"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>

    $('#openFileUpload').on('click', function () {
        $('#fileupload').modal('show');
        $('#uploadInput').val(''); // reset input
        $('#uploadFeedback').html('');
        var allow = $(this).data('allow');
        $('#uploadInput').attr('accept', allow);
    });

    $('#fileupload').on('hidden.bs.modal', function () {
        $('#uploadInput').val('');
        const event = new CustomEvent('fileUploadClosed');
        window.dispatchEvent(event);
    });

    // Submit form
    $('#uploadForm').on('submit', function (e) {
        e.preventDefault();

        let files = $('#uploadInput')[0].files;
        
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.each(files, function (i, file) {
            formData.append('files[]', file);
        });

        $('#uploadFileButton').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Uploading...');
        $('#closeFileUpload').prop('disabled', true);

        $.ajax({
            url: '{{ route('cms.file.upload') }}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                uploadedFiles = res.urls; // Simpan ke variabel global jika perlu

                // Trigger custom event
                const event = new CustomEvent('fileUploaded', {
                    detail: {
                        urls: res.urls
                    }
                });
                window.dispatchEvent(event); // kirim event global ke window

                let urls = res.urls.map(u => `<li><a href="${u}" target="_blank">${u}</a></li>`).join('');
                $('#uploadFeedback').html(`
                    <div class="alert alert-success">
                        <strong>Upload Sukses!</strong>
                        <ul>${urls}</ul>
                    </div>
                `);

                $('#uploadFileButton').prop('disabled', false).html('<i class="fa fa-upload"></i> Upload');
                $('#closeFileUpload').prop('disabled', false);
            },
            error: function (xhr) {
                $('#uploadFeedback').html(`<div class="alert alert-danger">Gagal upload file.</div>`);
                console.error(xhr.responseText);
            }
        });

    });
</script>