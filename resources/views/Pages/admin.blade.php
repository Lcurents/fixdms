<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sari Roti</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    {{-- Check Auth --}}

    <!-- /mnt/data/admin.blade.php -->
    @if (!Auth::check())
        <script type="text/javascript">
            window.location = "{{ url('/') }}"; // Redirect to the home page
        </script>
    @else
        <!-- User is authenticated, show the admin content -->
        <!-- Your existing admin content here -->
    @endif


    {{-- AkhirCheck Auth --}}

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <h4 class="nav-link">Admin</h4>
                    <h4 class="nav-link">{{ Auth::user()->name }}</h4>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <span class="brand-text font-weight-light">Sari Roti</span>
            </a>



            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Production</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation + Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/boxed.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Boxed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar <small>+ Custom Area</small></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Navbar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-footer.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Footer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Collapsed Sidebar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Data Entry
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user') }}" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Admin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link"
                                style="border: none; background: none; padding: 0; cursor: pointer;">
                                <i class="nav-icon fas fa-copy"></i>
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>
    <!-- Content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">user</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#myModal">
                                Tambah User
                            </button>
                            <br><br>
                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data User</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            {{-- berhsil input data --}}
                                            @if (session('suuccess'))
                                                <div class="alert alert-success">
                                                    {{ session('suuccess') }}
                                                </div>
                                            @endif
                                            {{-- gagal --}}
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $eror)
                                                            <li>
                                                                {{ $eror }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form action="{{ route('user.post') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Nama:</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Masukkan nama" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Masukkan email" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password:</label>
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Masukkan password" name="password" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data User</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $item)
                                        <tbody>
                                            <tr>
                                                <th>
                                                    {{ $item->name }}
                                                </th>
                                                <th>
                                                    {{ $item->email }}
                                                </th>
                                                <th>
                                                    <div class="btn-group">
                                                        <form action="{{ route('user.delete', ['id' => $item->id]) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('yakin ingin menghapus data ini')">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm delete-btn">Hapus</button>
                                                        </form>
                                                        <button type="button" class="btn btn-primary  btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#myModal-{{ $item->id }}">
                                                            Edit data
                                                        </button>
                                                        <!-- The Modal -->
                                                        <div class="modal" id="myModal-{{ $item->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Data User</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        {{-- berhsil input data --}}
                                                                        @if (session('suuccess'))
                                                                            <div class="alert alert-success">
                                                                                {{ session('suuccess') }}
                                                                            </div>
                                                                        @endif
                                                                        {{-- gagal --}}
                                                                        @if ($errors->any())
                                                                            <div class="alert alert-danger">
                                                                                <ul>
                                                                                    @foreach ($errors->all() as $eror)
                                                                                        <li>
                                                                                            {{ $eror }}
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        @endif
                                                                        <form
                                                                            action="{{ route('user.update', ['id' => $item->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('put')
                                                                            <div class="form-group">
                                                                                <label for="name">Nama:</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="name"
                                                                                    placeholder="Masukkan nama"
                                                                                    name="name" required
                                                                                    value="{{ $item->name }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email">Email:</label>
                                                                                <input type="email"
                                                                                    class="form-control"
                                                                                    id="email"
                                                                                    placeholder="Masukkan email"
                                                                                    name="email" required
                                                                                    value="{{ $item->email }}">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Submit</button>
                                                                        </form>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
    <!-- Akhir Content -->
    <!-- Content Wrapper. Contains page content -->

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.2.0</div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>


</body>

</html>
