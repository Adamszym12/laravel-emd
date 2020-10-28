<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    @stack('stylesheets')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{asset('/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Em directory</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    @auth
                    <div class="image">
                        <img src="{{asset(Auth::user()->profile_picture)}}" class="img-fluid" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('users.profile.edit')}}" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
                    </div>
                    @endauth
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @role('admin')
                        <li class="nav-item has-treeview {{ (request()->is('admin/*')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link  {{ (request()->is('admin/*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fas fa-cogs"></i>
                                <p>
                                    Admin
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('users.create')}}"
                                       class="nav-link {{ (request()->is('admin/create/user')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p>
                                            Create user
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('departments.create')}}"
                                       class="nav-link {{ (request()->is('admin/create/department')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-plus-square"></i>
                                        <p>
                                            Create department
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('departments.index')}}"
                                       class="nav-link {{ (request()->is('admin/manage/departments')) ? 'active' : '' }}">
                                        <i class="nav-icon far fa-user-circle"></i>
                                        <p>
                                            Manage departments
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}"
                                       class="nav-link {{ (request()->is('admin/manage/users')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users-cog"></i>
                                        <p>
                                            Manage users
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pages.edit', '1')}}"
                                       class="nav-link {{ (request()->is('admin/manage/users')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users-cog"></i>
                                        <p>
                                            Main page
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                        @role('user')
                        @foreach(Auth::user()->departments as $department)
                            <li class="nav-item">
                                <a href="{{route('departments.show', $department->id)}}"
                                   class="nav-link {{ (request()->routeIs('departments.show', '15')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        {{$department->name}}
                                    </p>
                                </a>
                            </li>
                        @endforeach
                        @endrole
                        <!-- logout -->
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" style="background-color: #e34b4d"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                                 </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <!-- /.logout -->
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
                @if($errors->any())
                    <div class="d-none toastrError">
                        @foreach($errors->all() as $error)
                        {{$error}}<br>
                        @endforeach
                    </div>
                @endif
                @if (session('status'))
                    <div class="d-none toastrSuccess">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="container-fluid">
                    @yield('breadcrumb')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
                <!-- modals -->
                @yield('modals')
                <!-- /.modals -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
               Made by Adam Szymański
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script>
    $('input:file').on('change',function(){
        //get the file name
        let fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-select/js/dataTables.select.min.js') }}"></script>
<!-- Webpack mix -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>

</html>
