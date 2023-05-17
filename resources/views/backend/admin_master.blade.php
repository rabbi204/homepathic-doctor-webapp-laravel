<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="{{ asset('logo.png') }}" rel="icon" />
        <title>Homepathic - Dashboard</title>
        <link href="{{ asset('backend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/ruang-admin.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        
        <style>
            .sidebar-light .nav-item.active .nav-link {
                color: #6777ef;
            }
        </style>
    </head>

    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
           @include('backend.layouts.sidebar')
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- TopBar -->
                   @include('backend.layouts.top_bar')
                    <!-- Topbar -->

                    <!---- sweetalert---->
                    @include('sweetalert::alert')

                    <!-- Container Fluid-->
                    <div class="container-fluid" id="container-wrapper">
                        @yield('backend_content')

                    </div>
                    <!---Container Fluid-->
                </div>
                <!-- Footer -->
               @include('backend.layouts.footer')
                <!-- Footer -->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/ruang-admin.min.js') }}"></script>
        <script src="{{ asset('backend/assets/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/demo/chart-area-demo.js') }}"></script>

          <!-- Page level plugins -->
    <script src="{{ asset('backend/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <script>
           $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
        @yield('scripts')
        <!----CK Editor JS CDN---->
        <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor');
        </script>
    </body>
</html>
