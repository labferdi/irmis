@extends('cms/template_blank')

@section('content')

<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h3"><b>Lupa Password</b></a>
            <!-- atur ulang password -->
            <!-- silahkan masukkan alamat email anda. kami akan mengirimkan email untuk mengganti password anda -->
        </div>

        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="input-group @error('email') @else mb-3 @endif">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <p id="email-error" class="error-message">{{ $message }}</p>
                @enderror

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Kirim reset password</button>
                    </div>
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route('cms-login') }}">Login</a>
            </p>
        </div>
    </div>
</div>

@endsection('content')
