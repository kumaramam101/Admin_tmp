<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('public/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    {{-- <link href="https://fonts.gstatic.com" rel="preconnect"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"rel="stylesheet"> --}}

    <link href="{{ asset('public/assets/css/selectstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/simple-datatables/datatable.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/common/common.css') }}" rel="stylesheet">

    <link href="{{ asset('public/assets/scss/common.scss') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    @if(isset($showHeader))
        @if($showHeader)
            @include('layout.header')
        @endif
    @endif
    @if(isset($showSidebar))
        @if($showSidebar)
            @include('layout.sidebar')
        @endif
     @endif

    @if($body)
        @include($body)
    @endif

    @if(isset($showFooter))
        @if($showFooter)
            @include('layout.footer')
        @endif
    @endif

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="{{ asset('public/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('public/assets/js/selectstyle.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/simple-datatables/datatable.common.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/simple-datatables/datatable.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/simple-datatables/datatable.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/toastr.min.js') }}"></script>

    <script src="{{ asset('public/assets/common/script.js') }}"></script>

    {{-- <div class="position-fixed end-0 top-0 p-3" style="z-index: 9999;width:400px;">
        <div class="alert alert-dismissible text-light fade" role="alert" id="toast" style="background: none!important;">
            <p class="m-0" id="toast_msg"></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div> --}}
</body>
<script>
    function _showtoastar(msg, hdc) {
    var ar = new Array();
    ar.push(new Array("msg", $("#toast_msg").html(msg)));
    ar.push(new Array("hdc", $("#toast").addClass(hdc)));
    $("#toast").toast("show");
  }
</script>
</html>
