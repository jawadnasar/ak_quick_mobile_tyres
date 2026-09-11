<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" type="image/png" href="{{ asset('front-theme/assets/img/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('back-theme/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back-theme/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('back-theme/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('back-theme/css/admin-enhancements.css') }}" rel="stylesheet">
    <link href="{{ asset('libraries/toastr/toastr.min.css') }}" rel="stylesheet">

    @stack('admin-styles')

    <style>
        .main_table { border-collapse: collapse; }
        .main_table thead tr th {
            color: var(--tableheadcolor) !important;
            white-space: normal;
            font-size: 14px;
            font-weight: 500;
            padding: 20px;
            line-height: 1.5rem;
            background-color: #f2f2f2;
        }
        .main_table tbody tr:nth-child(even) { background-color: #f2f2f2 !important; }
        .main_table tbody tr:nth-child(odd) { background-color: #fff !important; }
        .main_table tbody tr td {
            white-space: nowrap;
            padding: 20px;
            line-height: 1.5rem;
            font-size: 13px;
        }
        #loading { display: none; }
    </style>
</head>

<body>
    <div id="loading" aria-hidden="true">
        <div class="admin-spinner" role="status"><span class="visually-hidden">Loading...</span></div>
    </div>

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    <main id="main" class="main">
        @yield('content')
    </main>

    @include('admin.layouts.footer')

    <script src="{{ asset('libraries/jquery/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('back-theme/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libraries/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('libraries/swal/swal.js') }}"></script>

    @stack('admin-scripts')

    <script src="{{ asset('back-theme/js/admin-main-lite.js') }}"></script>
    <script src="{{ asset('back-theme/js/admin-common.js') }}"></script>

    @yield('javascript')
</body>
</html>
