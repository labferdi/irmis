@extends('cms/template_blank')

@section('content')

<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h3"><b>Ganti Password</b></a>
        </div>

        <div class="card-body">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="email" value="{{ $user->email }}">
                <div class="input-group @error('password') @else mb-3 @endif">
                    <input type="password" name="password" class="form-control" placeholder="Password baru">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <p id="password-error" class="error-message">{{ $message }}</p>
                @enderror

                <div class="input-group @error('password-confirm') @else mb-3 @endif">
                    <input type="password" name="password-confirm" class="form-control" placeholder="Konfirmasi password baru">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password-confirm')
                <p id="password-confirm-error" class="error-message">{{ $message }}</p>
                @enderror

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Ganti password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('content')
