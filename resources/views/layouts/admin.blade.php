<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
          href="{{ asset('themes/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/toastr/toastr.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('themes/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('themes/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('themes/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{ asset('themes/backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset('themes/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('themes/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{ asset('themes/backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('themes/backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/backend/dist/css/custom.css') }}">
    @yield('style')
    <style>
        html {
            scroll-behavior: smooth;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #009f4b;
            border-color: #009f4b;

        }
       .fa-check-circle {
            color: #DC3545;
        }
        .page-item.active .page-link {
            background-color: #DC3545;
            border-color: #DC3545;
        }
        .page-link:hover {
            color: #DC3545;
        }
        .page-link:focus {
            box-shadow: 0 0 0 0.2rem 0 0 0 0.2rem rgb(220, 53, 69);
        }
    </style>
</head>
<body class="sidebar-mini  layout-footer-fixed layout-fixed layout-navbar-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <h3 class="nav-link font-weight-bold active"
                    style="color: #dc3545;font-size: 22px;margin: 0">{{ config('app.name') }}</h3>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <img height="30" class="img-circle" src="{{ asset('themes/backend/dist/img/avatar.png') }}"
                         alt=""> {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('img/logo1.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">

            <span class="brand-text font-weight-light"><b>Admin</b>Panel</span>
        </a>

        <!-- Sidebar -->
        <div
            class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>

                    </li>
                    <?php
                    $subMenu = [
                        'slider','slider.add','slider.edit',
                        'story','story.add','story.edit',
                        'faq','faq.add','faq.edit',
                        'category','category.add','category.edit',
                        'sub_category','sub_category.add','sub_category.edit',
                        'sub_sub_category','sub_sub_category.add','sub_sub_category.edit',
                        'sub_sub_category_faq','sub_sub_category.faqadd','sub_sub_category.faqedit',


                    ];
                    ?>

                    <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list-ul"></i>
                            <p>
                                Website Content
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php
                            $subSubMenu = [
                                'slider','slider.add','slider.edit',
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{ route('slider') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Slider</p>
                                </a>
                            </li>
                            <?php
                            $subSubMenu = [
                                'category','category.add','category.edit',
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{ route('category') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                                <?php
                                $subSubMenu = [
                                    'sub_category','sub_category.add','sub_category.edit',
                                ];
                                ?>
                            <li class="nav-item">
                                <a href="{{ route('sub_category') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Sub Category</p>
                                </a>
                            </li>
                                <?php
                                $subSubMenu = [
                                    'sub_sub_category','sub_sub_category.add','sub_sub_category.edit',
                                    'sub_sub_category_faq','sub_sub_category.faqadd','sub_sub_category.faqedit'
                                ];
                                ?>
                            <li class="nav-item">
                                <a href="{{ route('sub_sub_category') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Sub Sub Category</p>
                                </a>
                            </li>
                            <?php
                            $subSubMenu = [
                                'story','story.add','story.edit',
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{ route('story') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Story</p>
                                </a>
                            </li>
{{--                            <?php--}}
{{--                            $subSubMenu = [--}}
{{--                                'faq','faq.add','faq.edit',--}}
{{--                            ];--}}
{{--                            ?>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('faq') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">--}}
{{--                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>--}}
{{--                                    <p>FAQ</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </li>

                    <?php
                    $subMenu = [
                        'about','about.all','about.edit',
                        'about_faq','about_faq.add','about_faq.edit','about_faq.all'
                    ];
                    ?>
                    <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list-ul"></i>
                            <p>
                                About Us
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php
                            $subSubMenu = [
                                'about','about.all','about.edit',
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>About</p>
                                </a>
                            </li>
                            <?php
                            $subSubMenu = [
                                'about_faq','about_faq.add','about_faq.edit','about_faq.all'
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{ route('about_faq') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>About FAQ</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <?php
                    $subMenu = [
                        'admin.all_users'
                    ];
                    ?>
                    <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list-ul"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php
                            $subSubMenu = [
                                'admin.all_users',
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{ route('admin.all_users') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>All Users</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <?php
                    $subMenu = [
                        'request_blood','approve','request_completed',
                    ];
                    ?>
                    <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list-ul"></i>
                            <p>
                                Request For Blood
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php
                            $subSubMenu = [
                                'request_blood'
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{ route('request_blood') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Request For Blood</p>
                                </a>
                            </li>
{{--                                <?php--}}
{{--                                $subSubMenu = [--}}
{{--                                    'approve'--}}
{{--                                ];--}}
{{--                                ?>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('approve') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">--}}
{{--                                        <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>--}}
{{--                                        <p>Approved</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

                                <?php
                                $subSubMenu = [
                                    'request_completed'
                                ];
                                ?>
                                <li class="nav-item">
                                    <a href="{{ route('request_completed') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                        <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                        <p>Completed</p>
                                    </a>
                                </li>

                        </ul>
                    </li>
<!--                    --><?php
//                    $subMenu = [
//                        'request_blood_donate','approve_donate','request_completed_donate',
//                    ];
                    ?>
{{--                    <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">--}}
{{--                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-list-ul"></i>--}}
{{--                            <p>--}}
{{--                                Request For Donate--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <?php--}}
{{--                            $subSubMenu = [--}}
{{--                                'request_blood_donate'--}}
{{--                            ];--}}
{{--                            ?>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('request_blood_donate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">--}}
{{--                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>--}}
{{--                                    <p>Request For Donate</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <?php--}}
{{--                            $subSubMenu = [--}}
{{--                                'approve_donate'--}}
{{--                            ];--}}
{{--                            ?>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('approve_donate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">--}}
{{--                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>--}}
{{--                                    <p>Approved</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <?php--}}
{{--                            $subSubMenu = [--}}
{{--                                'request_completed_donate'--}}
{{--                            ];--}}
{{--                            ?>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('request_completed_donate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">--}}
{{--                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>--}}
{{--                                    <p>Completed</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> @yield('title') </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Design & Developed By <a target="_blank" href="https://2aitbd.com">2A IT LIMITED</a>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2022-{{ date('Y') }} <a
                href="{{ route('dashboard') }}">{{ config('app.name') }}</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('themes/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('themes/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('themes/backend/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('themes/backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('themes/backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('themes/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('themes/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempus dominus Bootstrap 4 -->
<script
    src="{{ asset('themes/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('themes/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('themes/backend/plugins/toastr/toastr.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('themes/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('themes/backend/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('themes/backend/dist/js/sweetalert2@9.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('themes/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var message = '{{ session('message') }}';
        var error = '{{ session('error') }}';

        if (!window.performance || window.performance.navigation.type != window.performance.navigation.TYPE_BACK_FORWARD) {
            if (message != '')
                $(document).Toasts('create', {
                    icon: 'fas fa-envelope fa-lg',
                    class: 'bg-success',
                    title: 'Success',
                    autohide: true,
                    delay: 2000,
                    body: message
                })

            if (error != '')
                $(document).Toasts('create', {
                    icon: 'fas fa-envelope fa-lg',
                    class: 'bg-danger',
                    title: 'Error',
                    autohide: true,
                    delay: 2000,
                    body: error
                })
        }
    });
</script>

<script>
    $(function () {
        //Date picker
        $('.date-picker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd-mm-yyyy', {'placeholder': 'dd-mm-yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm-dd-yyyy', {'placeholder': 'mm-dd-yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date and time picker
        $('.date-time').datetimepicker({
            format: 'DD-MM-YYYY hh:mm A',
            icons: {time: 'far fa-clock'}
        });
        //Date and time picker
        $('.date,.start_date,.end_date').datetimepicker({
            format: 'DD-MM-YYYY',
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM-DD-YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    function jsNumberFormat(yourNumber) {
        //Seperates the components of the number
        var n= yourNumber.toString().split(".");
        //Comma-fies the first part
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //Combines the two sections
        return n.join(".");
    }
</script>
@yield('script')
<!-- AdminLTE App -->
<script src="{{ asset('themes/backend/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
