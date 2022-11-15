@extends('layout')

 
@section('content')
    <form class="form" method="post" action="{{ @route('login-check') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="input" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection