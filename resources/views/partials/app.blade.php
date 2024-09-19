<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WEB</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset ('assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset ('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset ('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}"> --}}
    <link rel="stylesheet" href="{{asset ('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('assets/js/select.dataTables.min.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset ('assets/images/icon-title.png')}}" />
</head>

<body>
    

    @include('partials.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('partials.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('partials.footer')
        </div>
    </div>

    
</body>
<!-- plugins:js -->
<script src="{{asset ('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset ('assets/vendors/js/bootstrap.min.js.map')}}"></script>
<script src="{{asset ('assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset ('assets/vendors/chart.js/Chart.umd.js')}}"></script>
<script src="{{asset ('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset ('assets/js/off-canvas.js')}}"></script>
{{-- <script src="{{asset ('assets/js/hoverable-collapse.js')}}"></script> --}}
<script src="{{asset ('assets/js/template.js')}}"></script>
<script src="{{asset ('assets/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset ('assets/js/dashboard-dark.js')}}"></script>
<!-- End custom js for this page-->

{{-- SCRIPT HIGHCHART.JS --}}
{{-- <script src="{{asset ('assets/vendors/highcharts/highcharts.js')}}"></script>
<script src="{{asset ('assets/vendors/highcharts/modules/exporting.js')}}"></script>
<script src="{{asset ('assets/vendors/highcharts/modules/accessibility.js')}}"></script> --}}
</html>