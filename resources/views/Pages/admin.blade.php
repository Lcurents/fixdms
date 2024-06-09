@extends('layout.nav')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
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
                                                    <label for="role">Level:</label>
                                                    <select name="role" id="role" class="form-control">
                                                        <option value="admin">Admin</option>
                                                        <option value="operator">Operator</option>
                                                        <option value="user">User</option>
                                                    </select>
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
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
                                                    {{ $item->role }}
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
                                                                            action="{{ route('user.update', ['id' => $item->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('put')
                                                                            <div class="form-group">
                                                                                <label for="name">Nama:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="name"
                                                                                    placeholder="Masukkan nama"
                                                                                    name="name" required
                                                                                    value="{{ $item->name }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email">Email:</label>
                                                                                <input type="email" class="form-control"
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
