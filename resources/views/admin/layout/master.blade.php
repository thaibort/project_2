<html lang="en" style="height: auto;" class="translated-ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.css"/>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/summernote/summernote-bs4.min.css">
    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>
    <link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css">
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" style="display: none;">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <div class="user-panel d-flex">
                        <div class="info d-block">
                            {{session()->get('admin.name')}}
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div cl6ass="user-panel d-flex">
                        <div class="info d-block">
                            <a href="{{url('admin/logout')}}">Đăng xuất</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../img/bkacd.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">BKACAD</font>
                    </font>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-scrollbar-vertical-hidden">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 876px;"></div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible">
                        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                            <!-- Sidebar user panel (optional) -->

                            <!-- SidebarSearch Form -->
                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="sidebar-search-results">
                                    <div class="list-group"><a href="#" class="list-group-item">
                                            <div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">O</font>
                                                </font><strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">e</font>
                                                </font><strong class="text-light"></strong>m<strong class="text-light"></strong>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">e</font>
                                                </font><strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">O</font>
                                                </font><strong class="text-light"></strong>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">u</font>
                                                </font><strong class="text-light"></strong>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">n</font>
                                                </font><strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong>
                                            </div>
                                            <div class="search-path"></div>
                                        </a></div>
                                </div>
                            </div>

                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                    <li class="nav-item">
                                        <a href="{{url('admin/home')}}" class="nav-link active">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Trang chủ
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                        </ul>
                                    </li>
                                    <li class="nav-header">Quản Lý</li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/staff')}}" class="nav-link">
                                            <i class="nav-icon fas fa-columns"></i>
                                            <p>
                                                Quản lý nhân viên
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/schyear')}}" class="nav-link">
                                            <i class="nav-icon fas fa-columns"></i>
                                            <p>
                                                Quản lý khóa
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/vocation')}}" class="nav-link">
                                            <i class="nav-icon fas fa-columns"></i>
                                            <p>
                                                Quản lý ngành
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/class')}}" class="nav-link">
                                            <i class="nav-icon fas fa-columns"></i>
                                            <p>
                                                Quản lý lớp
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/student')}}" class="nav-link">
                                            <i class="nav-icon fas fa-columns"></i>
                                            <p>
                                                Quản lý sinh viên
                                            </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{url('admin/invoice')}}" class="nav-link">
                                            <i class="nav-icon fas fa-columns"></i>
                                            <p>
                                                Quản lý hóa đơn
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper" style="min-height: 404px;">
            @yield('body')
        </div>
        <footer class="main-footer">
            <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>
    </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.js"></script>
</body>
</html>
