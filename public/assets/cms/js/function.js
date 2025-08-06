document.addEventListener('DOMContentLoaded', function () {
    $("#basic-datatables").DataTable();

    $('.select2').select2({
        theme: 'bootstrap-5',
        placeholder: 'Pilih',
        allowClear: true
    });

    initTinyMce('textarea#editor');
});

function initTinyMce(selector) {
    tinymce.init({
        selector: selector,
        plugins: 'lists link image code table media wordcount fullscreen',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code ',
        setup: function (editor) {
            editor.on('OpenWindow', function () {
                setTimeout(() => {
                    document.querySelectorAll('.tox-dialog').forEach(dialog => {
                        dialog.style.zIndex = 1060;
                    });
                }, 10);
            });
        }
    });
}

function initMiniTinyMce(selector) {
    tinymce.init({
        selector: selector,
        plugins: 'link',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | link',
        setup: function (editor) {
            editor.on('OpenWindow', function () {
                setTimeout(() => {
                    document.querySelectorAll('.tox-dialog').forEach(dialog => {
                        dialog.style.zIndex = 1060;
                    });
                }, 10);
            });
        }
    });
}

// Validate Forms
(() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
})()

// Menampilkan alert dengan SweetAlert2
function showAlert(title, message, state){
    var button = "";
    if(state == "success"){
        button = "btn btn-success";
    }else if(state == "error"){
        button = "btn btn-danger";
    }else if(state == "info"){
        button = "btn btn-info";
    }

    Swal.fire({
        title: title,
        text: message,
        icon: state,
        buttons: {
            confirm: {
                className: button,
            },
        },
    });
}

// Konfirmasi alert dengan SweetAlert2
function confirmAlert(action, text){
    Swal.fire({
        title: "Peringatan!",
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Lanjutkan",
        cancelButtonText: "Batalkan",        
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = action
        } else {
            swal.close();
        }
    });
}

// Menampilkan notifikasi dengan Bootstrap Notify
function showNotify(title, message, state) {
    var placementFrom = "top";
    var placementAlign = "center";
    var state = state;
    var message = message;
    var title = title;
    var content = {};

    content.message = message;
    content.title = title;
    content.icon = "fa fa-bell";

    $.notify(content, {
        type: state,
        placement: {
            from: 'top',
            align: 'right',
        },
        time: 1000,
        delay: 0,
        html:true
    });
};
 
// Fungsi untuk mengubah teks menjadi slug
function slugify(text) {
    return text.toLowerCase().replace(/[^a-z0-9]+/g, '-');
}

// Penting! untuk menghindari konflik dengan TinyMCE dialog didalam modal
document.addEventListener('focusin', (e) => {
    if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
        e.stopImmediatePropagation();
    }
});


function openFileBrowser(callback) {
    const fileWindow = window.open('/panel/file/picker', 'File Manager', 'width=800,height=500');

    window.SetFileUrl = function(url) {
        callback(url);
        fileWindow.close();
    }
}

    