@extends('layouts.app')

@section('content')

<div class="container">

<form action="/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PATCH')
<div class="row mb-3 p-2">
<label for="title">Name</label>
<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $user->profile->title}}" autocomplete="title" autofocus>
@error('title')
<span class="invalid-feedback" role="alert">
<strong>{{$message}}</strong>
</span>
@enderror
</div>

<div class="row mb-3 p-2">
<label for="description">Description</label>
<textarea rows="5" type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" autocomplete="description">{{ old('description') ?? $user->profile->description}}</textarea>

@error('description')
<span class="invalid-feedback" role="alert">
<strong>{{$message}}</strong>
</span>
@enderror
</div>

<div class="row mb-3 p-2">
<label for="url">Url</label>    <input type="text" id="url" name="url" class="form-control @error('url') is-invalid
@enderror" value="{{ old('url') ?? $user->profile->url}}" auto
complete="url">

@error('url')
<span class="invalid-feedback" role="alert">
<strong>{{$message}}</strong>
</span>
@enderror
</div>


<div class="row mb-3 p-2">
<label for="image">Edit Profile Picture</label>    <input type="file" id="image" name="image" class="col-12 @error('image') is-invalid
@enderror" value="{{ old('image') }}" auto
complete="image">

@error('image')
<span class="invalid-feedback" role="alert">
<strong>{{$message}}</strong>
</span>
@enderror
</div>

<div class="row mb-3 p-2">
<div class="text-right col-12">
<button type="submit" class=" btn btn-primary">Edit Profile</button>
</div>
</div>

</form>

</div>
@endsection
