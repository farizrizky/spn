<html>
<head>
    <title>File Picker</title>
    <script src="{{ asset('assets/cms/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["{{ asset('assets/cms/css/fonts.min.css') }}"],
            },
            active: function () {
            sessionStorage.fonts = true;
            },
    });
    </script>
    <script src="{{ asset('assets/cms/js/core/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/cms/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/cms/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('assets/cms/css/demo.css') }}" />
</head>
<body>
    <div class="wrapper">
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
    </div>
      
    <script>
        function selectFile(url) {
            window.opener.SetFileUrl(url);
        }
    </script>
    <script src="{{ asset('assets/cms/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/cms/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.8.1"></script>
    <script src="{{ asset('assets/cms/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('assets/cms/js/kaiadmin.min.js') }}"></script>
    <script src="{{ asset('assets/cms/js/setting-demo.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({
                responsive: true,
            });
        });
    </script>
</body>
</html>
