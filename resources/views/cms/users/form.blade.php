@extends('cms/template')

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

                <form method="post" action="{{ $user ? route('cms-user-update', ['id' => $user->id]) : route('cms-user-save') }}">
                    <!-- Default box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $user ? 'Ubah Data Penggunan' : 'Tambah Pengguna Baru' }}</h3>
                        </div>
                        <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Lengkap" value="{{ old('name') ?? ( $user->name ?? '' ) }}">
                            @error('name')
                            <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') ?? ( $user->email ?? '' ) }}">
                            @error('email')
                            <span id="email-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                            @if($user)
                            <span class="form-text text-muted small">Kosongkan apabila tidak diubah</span>
                            @else
                            <span class="form-text text-muted small">Minimal 8 karakter</span>
                            @endif
                            @error('password')
                            <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="privilege">Hak Akses</label>
                            <div class="row">
                            @foreach($modules as $k => $v)
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="privilege[]" value="{{ $k }}" id="{{ $k }}" @if($user && $user->privilege && in_array($k, $user->privilege)) checked @endif >
                                        <label class="form-check-label" for="{{ $k }}">{{ $v }}</label>
                                    </div>
                                </div>
                                @if( $loop->even )
                                </div><div class="row">
                                @endif
                            @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" id="is_active" type="checkbox" name="is_active" value="1" @if($user && $user->is_active) checked @endif >
                                <label class="form-check-label" for="is_active">Aktif</label>
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

