@extends('layout.nav')
@section('content')
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kategori</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Kategori</li>
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
                        <div class="container">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah KPI
                            </button>
                            <br><br>
                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data KPI</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Kategori</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama_Kategori</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $item)
                                        <tbody>
                                            <tr>
                                                <th>
                                                    {{ $item->id }}
                                                </th>
                                                <th>
                                                    {{ $item->nama_kategori }}
                                                </th>
                                                <th>
                                                    {{ $item->department }}
                                                </th>
                                                <th>
                                                    <div class="btn-group">
                                                        <form action="{{ route('kategori.delete', ['id' => $item->id]) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('yakin ingin menghapus data ini')">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm delete-btn">Hapus</button>
                                                        </form>
                                                        <button type="button" class="btn btn-primary  btn-sm"
                                                            data-toggle="modal" data-target="#myModal-{{ $item->id }}">
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
                                                                            action="{{ route('kategori.update', ['id' => $item->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('put')
                                                                            <div class="form-group">
                                                                                <label for="kategori">Nama Kategori:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="kategori"
                                                                                    placeholder="Masukkan nama"
                                                                                    name="kategori" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="department">Department:</label>
                                                                                <select name="department" id="department"
                                                                                    class="form-control">
                                                                                    <option value="purchasing">Purchasing
                                                                                    </option>
                                                                                    <option value="scm">SCM</option>
                                                                                    <option value="production">Production
                                                                                    </option>
                                                                                    <option value="engineering">Engineering
                                                                                    </option>
                                                                                    <option value="qc">QC</option>
                                                                                    <option value="hrga">HRGA</option>
                                                                                    <option value="finance">Finance
                                                                                    </option>
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
@endsection
