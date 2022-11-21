@extends('layout')

@section('content')
@if($id)
<h1>ini article ke {{ $id }}</h1>
@else
<h1>ini text dengan layout 2</h1>
@endif
@endsection
