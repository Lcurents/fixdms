@extends('layout.nav')
@section('content')
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Entry</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Entry</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <div class="content-wrapper">
        <section class="content">
            <br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Entry</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="" method="get">
                                    <div class="form-group">
                                        <label for="name">Plant:</label>
                                        <select name="role" id="role" class="form-control">
                                            @foreach ($plants as $plant)
                                                <option value="{{ $plant->nama_plant }}">
                                                    {{ $plant->nama_plant }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Department:</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="purchasing">Purchasing</option>
                                            <option value="scm">SCM</option>
                                            <option value="production">Production</option>
                                            <option value="engineering">Engineering</option>
                                            <option value="qc">QC</option>
                                            <option value="hrga">HRGA</option>
                                            <option value="finance">Finance</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Range Data:</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="day">Day</option>
                                            <option value="month">Month</option>
                                            <option value="year">Year</option>
                                        </select>
                                    </div>
                                </form>
                                <div class="container">
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#myModal">
                                        Tambah Data
                                    </button>
                                    <br><br>
                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Data KPI</h4>
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
                                                    <form action="{{ route('kategori.post') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="kategori">Nama Kategori:</label>
                                                            <input type="text" class="form-control" id="kategori"
                                                                placeholder="Masukkan nama" name="kategori" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="department">Department:</label>
                                                            <select name="department" id="department" class="form-control">
                                                                <option value="purchasing">Purchasing</option>
                                                                <option value="scm">SCM</option>
                                                                <option value="production">Production</option>
                                                                <option value="engineering">Engineering</option>
                                                                <option value="qc">QC</option>
                                                                <option value="hrga">HRGA</option>
                                                                <option value="finance">Finance</option>
                                                            </select>
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
                                <div class="condainer">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Plant</th>
                                                <th>Department</th>
                                                <th>Date</th>
                                                <th>Category</th>
                                                <th>KPI</th>
                                                <th>Target</th>
                                                <th>Pencapaian</th>
                                                <th>Status</th>
                                                <th>Root Cause</th>
                                                <th>Act</th>
                                            </tr>
                                        </thead>
                                        @foreach ($data as $item)
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        {{ $item->id }}
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
                                                                Edit
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
                                                                                <div class="form-group">
                                                                                    <label for="role">Level:</label>
                                                                                    <select name="role" id="role"
                                                                                        class="form-control">
                                                                                        <option value="admin"
                                                                                            {{ $item->role == 'admin' ? 'selected' : '' }}>
                                                                                            Admin</option>
                                                                                        <option value="operator"
                                                                                            {{ $item->role == 'operator' ? 'selected' : '' }}>
                                                                                            Operator</option>
                                                                                        <option value="user"
                                                                                            {{ $item->role == 'user' ? 'selected' : '' }}>
                                                                                            User</option>
                                                                                    </select>
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
                                                    <th>
                                                        {{ $item->email }}
                                                    </th>
                                                    <th>
                                                        {{ $item->role }}
                                                    </th>

                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
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
@endsection
