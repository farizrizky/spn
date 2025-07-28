<!DOCTYPE html>
<html lang="en">
<head>
    @include('cms.partial.auth-head')
</head>
<body class="vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="text-center mb-4">
            <img class="img-fluid" src="{{ asset('assets/cms/img/color-logo-text.png') }}" width="120px">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4">
                @yield('content')
            </div>
        </div>
    </div>

    @include('cms.partial.auth-script')
    <script>
        function showAlert(title, message, state) {
            var button = "";
            if (state == "success") {
                button = "btn btn-success";
            } else if (state == "error") {
                button = "btn btn-danger";
            } else if (state == "info") {
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
    </script>
</body>
</html>
