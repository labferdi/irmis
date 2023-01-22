@extends('layout')

@section('content')
<form class="form" method="post" action="simpan_news" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="text" class="form-control" id="email" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="file" name="file">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="checkme" name="checkme">
        <label class="form-check-label" for="checkme">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
