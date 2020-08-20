@extends('layouts.app')

@section('content')
<div class="container">
  
<div class="row">
<p class="ml-2 my-0 px-0">Replies to {{$comment->user->name}}'s Comment</p> &nbsp; &nbsp;
<a class="" href="/post/{{$comment->post_id}}">Back</a>
</div>
<hr class="row">

<div class="row">
<div class="col-12 bdg-white">

<a href="/profile/{{$comment->user_id}}"><strong>{{$comment->user->name}}</strong></a>
<br>
<span>{{$comment->body}}</span>
</div>
</div>
<hr class="row">


@if($replies)
@foreach($replies as $reply)
<div class="row">
<a class="col-12" href="/profile/{{$reply->user->id}}">{{$reply->user->name}}</a>
<span class="col-12">{{$reply->body}}</span>
</div>
<hr class="row">
@endforeach
@endif


<div class="row">
  <form class="col-12" method="POST" action="/reply">
    @csrf
    <div class="">
    <input type="hidden" value="{{$comment->id}}" name="comment_id">
    <textarea name="body" class="form-control @error('body') is-invalid @enderror" placeholder="Write a reply" autocomplete="body" value="{{old('body')}}"></textarea>
    @error('body')
    <span class="invalid-feedback">
      <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>
    <div class="text-right pt-2">
      <button class="btn btn-primary" type="submit">Reply</button>
    </div>
  </form>
</div>

</div>
@endsection