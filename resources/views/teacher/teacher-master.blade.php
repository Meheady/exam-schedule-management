<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.1/sweetalert2.min.css" integrity="sha512-NvuRGlPf6cHpxQqBGnPe7fPoACpyrjhlSNeXVUY7BZAj1nNhuNpRBq3osC4yr2vswUEuHq2HtCsY2vfLNCndYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this template-->
    <link href="{{asset('assets')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

@include('teacher.includes.sidebar')

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('teacher.includes.topbar')

            @yield('teacher-main')

        </div>
        <!-- End of Main Content -->

        @include('teacher.includes.footer')
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


@include('teacher.includes.logout-modal')
<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{asset('assets')}}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('assets')}}/js/demo/chart-area-demo.js"></script>
<script src="{{asset('assets')}}/js/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>


@if(Session::has('success'))
    <script>
        $(document).ready(function(){
            toastr.success('{{Session::get('success')}}');
        });
    </script>
@endif
@if(Session::has('warning'))
    <script>
        $(document).ready(function(){
            toastr.success('{{Session::get('warning')}}');
        });
    </script>
@endif
@if(Session::has('error'))
    <script>
        $(document).ready(function(){
            toastr.success('{{Session::get('error')}}');
        });
    </script>
@endif

@yield('script')

</body>

</html>

