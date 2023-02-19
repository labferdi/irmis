@extends('template')

@section('content')
<div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pengguna</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">CMS</a></li>
                                <li class="breadcrumb-item">Pengguna</li>
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <form method="post" action="{{ route('cms-user-save') }}">
                    <!-- Default box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Pengguna Baru</h3>
                        </div>
                        <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="password" class="form-control" name="name" id="name" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="privilege">Jabatan</label>
                            <select class="form-control" name="privilege" id="privilege">
                                <option value="" selected disabled >Jabatan</option>
                                <option value="administrator">Administator</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="is_active" type="checkbox" name="is_active" value="1">
                                <label class="custom-control-label" for="is_active">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('cms-user-list') }}" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                    <!-- /.card-footer-->

                </div>
                <!-- /.card -->
                </form>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content wrapper -->
@endsection('content')

