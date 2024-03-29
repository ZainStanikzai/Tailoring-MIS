<!doctype html>
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Minible - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    @yield('customStyle')
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }} " rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }} "></script>
    
    @livewireStyles


</head>


<body class="" data-sidebar-size="{{ App\Models\Setting::all()->first()['sidbarSize'] }}"
    data-bs-theme="{{ App\Models\Setting::all()->first()['layoutMode'] }}"
    data-topbar="{{ App\Models\Setting::all()->first()['tapbarColor'] }}"
    data-sidebar="{{ App\Models\Setting::all()->first()['sidebarColor'] }}">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->
    <!-- Loader -->
    {{-- <livewire:partials.preloader /> --}}
    <!-- Begin page -->
    <div id="layout-wrapper">

        @if (!Route::is('login'))
            <livewire:partials.topbar />
            <!-- ========== Left Sidebar Start ========== -->
            <livewire:partials.left-sidebar />
            <!-- Left Sidebar End -->
        @endif
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <!-- start main content-->
        {{ $slot }}
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    @if (!Route::is('login'))
        <livewire:partials.rigth-sidebar />
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
    @endif
    <!-- Right Sidebar -->


    <!-- JAVASCRIPT -->
    @livewireScripts
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    {{-- <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }} "></script> --}}
    {{-- <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }} "></script> --}}
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }} "></script>
    {{-- <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }} "></script> --}}
    {{-- <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }} "></script> --}}
    <script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }} "></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
  
    @yield('customJS')
    

</html>
