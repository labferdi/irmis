@extends('cms/template_blank')

@section('content')

<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1"><b>Login</b> CMS</a>
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
                <p id="name-error" class="error-message">{{ $message }}</p>
                @enderror

                <div class="input-group @error('email') @else mb-3 @endif">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <p id="password-error" class="error-message">{{ $message }}</p>
                @enderror

                <div class="row">
                    <div class="offset-8 col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route('cms-forgot-password') }}">Lupa password ?</a>
            </p>
        </div>
    </div>
</div>

@endsection('content')
