@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="">HELLO! This is my first laravel app...</h1>

{{$user->email}}
{{$name}}
</div>

@endsection
