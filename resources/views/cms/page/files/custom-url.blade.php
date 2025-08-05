<div class="modal fade" id="customUrl" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input File dari URL</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="text" id="fileUrl" name="fileUrl" class="form-control" placeholder="Masukkan URL File">
                <div class="invalid-feedback">URL file harus diisi</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="addUrl">
                    <i class="fa fa-upload"></i> Input
                </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fa fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#openCustomUrl').on('click', function() {
        $('#customUrl').modal('show');
        $('#fileUrl').val(''); // reset input
    });

    $('#customUrl').on('hidden.bs.modal', function() {
        $('#fileUrl').val('');
    });

    $('#addUrl').on('click', function(){
        let url = $('#fileUrl').val().trim();
        const event = new CustomEvent('fileUrlAdded', { detail: { url: url } });
        window.dispatchEvent(event);
    });
</script>