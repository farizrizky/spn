<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>PT. SPN - {{ $title ?? 'Panel Admin' }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" >
<link rel="icon" href="{{ asset('assets/cms/img/logo-rectangle.png') }}" type="image/x-icon">
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/cms/css/plugins.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/cms/css/kaiadmin.min.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css" />
<link rel="stylesheet" href="{{ asset('assets/cms/css/demo.css') }}" />
