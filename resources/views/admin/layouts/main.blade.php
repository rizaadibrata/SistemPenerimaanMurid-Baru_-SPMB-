<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - PPDB SMK Bakti Nusantara 666</title>
    
    <!-- Vendor CSS -->
    <link href="{{ asset('assets_admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/css/custom-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/css/custom-sidebar.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body id="page-top" data-route="{{ request()->route()->getName() }}">
    <div id="wrapper">
        @include('admin.partials.sidebar')
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.partials.navbar')
                
                <div class="container-fluid">
                    @include('admin.partials.alerts')
                    @yield('content')
                </div>
            </div>
            
            @include('admin.partials.footer')
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('assets_admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/chart.js/Chart.min.js') }}"></script>
    @stack('scripts')
</body>
</html>