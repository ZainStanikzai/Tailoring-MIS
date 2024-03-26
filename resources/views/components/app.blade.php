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
    <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }} " rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
   
</head>


<body class="" data-sidebar-size="sm ">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->
<!-- Loader -->
    {{-- <livewire:partials.preloader /> --}}
    <!-- Begin page -->
    <div id="layout-wrapper">

        @if(!Route::is('page.login') )
        // true
        
       <livewire:partials.topbar />

        <!-- ========== Left Sidebar Start ========== -->
        <livewire:partials.left-sidebar />
        <!-- Left Sidebar End -->

        

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <!-- start main content-->
       
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- Right Sidebar -->
    <livewire:partials.rigth-sidebar />
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
@else
 {{$slot}}
@endif
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }} "></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }} "></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }} "></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }} "></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }} "></script>
    <script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }} "></script>
    
    @yield('customJS')

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }} "></script>


    
</body>

</html>