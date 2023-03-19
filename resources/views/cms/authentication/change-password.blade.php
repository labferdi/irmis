@extends('cms/template')

@section('content')
<div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ubah Password</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">CMS</a></li>
                                <li class="breadcrumb-item active">Ubah Password</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <form method="post">
                    <!-- Default box -->
                    <div class="card card-primary">
                        <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="password-old">Password saat ini</label>
                            <input type="password" class="form-control @error('password_old') is-invalid @enderror" name="password_old" id="password-old" placeholder="Password saat ini">
                            @error('password_old')
                            <span id="password-old-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                            <span class="form-text text-muted small">Minimal 8 karakter</span>
                            @error('password')
                            <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password baru</label>
                            <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" id="password-confirm" placeholder="Konfirmasi Password">
                            @error('password-confirm')
                            <span id="password-confirm-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('cms-index') }}" class="btn btn-default">Batal</a>
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

