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
 

function slugify(text) {
    return text.toLowerCase().replace(/[^a-z0-9]+/g, '-');
}
