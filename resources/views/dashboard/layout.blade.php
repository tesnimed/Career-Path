<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kontrol Paneli')</title>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style>
    /* تنسيق لضمان ظهور المحتوى بشكل صحيح عند غياب السايد بار */
    .full-width {
        margin-left: 0 !important;
        width: 100% !important;
    }

    .body {
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
    }
    </style>
</head>

<body class="dashboard-page">

    @include('components.navbar')


    <button class="navbar-toggler d-lg-none dashboard-sidebar-toggler" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#sidebarOffcanvas" style="margin-right: 10px;">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-start d-md-block" tabindex="-1" id="sidebarOffcanvas"
        aria-labelledby="sidebarOffcanvasLabel">
        @include('components.sidebar')
    </div>

    <div id="content-wrapper">
        <div class="content p-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')

</body>

</html>