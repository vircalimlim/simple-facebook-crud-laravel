@extends('layouts.app')

@section('content')
<div class="container">

<div class="row no-gutters">

<div class=" d-flex align-items-center">
<div class="col-md-5 col-lg-3">
<img class="border rounded-circle border-pri    mary h-1d00 w-1h00 px-0 mx-0 col-f5" style="    height: 120px; width: 120px;"  src="/storage/{{$user->profile->image ?? 'Default.jpg'}}" alt="image">
</div>

<div class="col-md-7 col-lg-9 mt-3">
<h2>{{$user->name}}</h2>

@can('update', $user->profile)
<div class="mb-3">                                  <a  href="/profile/{{ $user->id }}/edit" class="btn btn-primary">
Edit Profile</a>                                </div>
@endcan

@can('update', $user->profile)
<div class="">
<a  href="/post/create" class="btn btn-primary">Add Post</a>
</div>
@endcan

</div>
</div>

<div class="d-flex align-items-center justify-content-center  pt-5 col-12">
<div class="pr-3"><strong>{{ $user->posts->count() }} </strong>Posts</div>
<div class="pr-3"><strong>25K </strong>Followers</div>
<div class="pr-3"><strong>10K </strong>Following</div>
</div>

<div class="col-12 pl-3 mt-4">{{ $user->profile->description }}</div>
<div class="col-12 pl-3"><a href="">{{ $user->profile->url }}</a></div>

</div>

<div class="row no-gutters mt-5">
@foreach($user->posts as $post)

<div class="col-6 pb-2">
<a class=""  href="/post/{{ $post->id }}">
 <img class="col-12 h-100 px-1" src="/storage/{{$post->image}}" alt="image">
</a>
</div>

@endforeach
</div>



</div>
@endsection
