@extends('layouts.app')

@section('content')

<div class="container pl-4">

<div class="col-md-10 col-lg-8">

<div class="row col-12 text-center"> <h2>Add Post</h2> </div>

<div class="row">
	<form action="/post" method="POST" enctype="multipart/form-data">
@csrf
<div class="row mb-4">
	<label for="caption">Add Caption</label>
	<input type="text" id="caption" name="caption" class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption') }}" autocomplete="caption" autofocus>

@error('caption')
	<span class="invalid-feedback" role="alert">
	<strong>{{$message}}</strong>
	</span>
@enderror
</div>

<div class="row mb-4">
	<label for="image"> Post Image </label>
	<input type="file" name="image" id="image" class="form-control-file">

@error('image')                                                                                       <strong>{{$message}}</strong>           @enderror
</div>

<div class="row mt-4">
<button class="btn btn-primary" type="submit">Create Post</button>
</div>

</div>
	</form>

</div>

@endsection
