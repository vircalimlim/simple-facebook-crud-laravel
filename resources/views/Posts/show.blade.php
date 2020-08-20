@extends('layouts.app')

@section('content')

<div class="container">

<div class="row pl-3 pr-3 pb-3">
<img height="40px" style="width:40px" class="rounded-circle" src="/storage/{{$user->user->profile->image ?? 'Default.jpg'}}" alt="image">

<span class="border-left border-primary pl-3 ml-3">{{$user->user->name}}</span>
</div>

<div class="row justify-content-center">
  

<div class="col-12 mt-4">
<span>{{ $user->caption }} </span>
@can('delete', $user)
<form class="" action="/post/{{$user->id}}/delete" method="POST"> 
<form class="px-0 mx-0" action="/post/{{$user->id}}/delete" method="POST"> 
@method('DELETE') 
@csrf 
<button type="submit" class="text-primary" style="border:none; background-color: #F9FAFC; font-size: 10px;">Delete</button> </form>
@endcan


</div>
  
<div class="col-11 p-2 border border-primary">
<img class="col-12 px-0"  src="/storage/{{ $user->image }}" alt="image">
<div class="col-12 text-right px-0">
<span class="">{{$user->created_at}}</span>
</div>
</div>

</div>
<hr>

<div class="row pl-3 justify-content-center">
<div class="d-flex col-12 align-items-center">

<span class=" col-6">
  <form method="POST" action="/likepost">
    @csrf
    
    <input type="hidden" name="post_id" value="{{$user->id}}">
<span>{{$user->follow->count()}}</span>
    <button class="text-primary font-weight-bold" style="background-color: #F9FAFC; border: none; outline: none" type="submit">Star</button>
    
  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/> </svg>
  </form>
</span>

<span class="col-6 text-right">Share &nbsp<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-share" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M11.724 3.947l-7 3.5-.448-.894 7-3.5.448.894zm-.448 9l-7-3.5.448-.894 7 3.5-.448.894z"/> <path fill-rule="evenodd" d="M13.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 10a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm-11-6.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/> </svg></span>
</div>
</div>
<hr>

<div class="row p-3">
  
<form method="POST" action="/comment" class="px-0 col-12">
  @csrf
  <input type="hidden" name="post_id" value="{{$user->id}}">
<textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" rows="4" placeholder="Write comment" autocomplete="body" value="{{ old('body') }}"></textarea>
@error('body')
<span class="invalid-feedback">
  <strong>{{$message}}</strong>
</span>
@enderror

<div class="text-right">
<button type="submit" class="btn btn-primary mt-2">Comment</button>
</div>
</form>
</div>
<hr>

<div class="row">
  @foreach($user->comment as $comment)
  <div class="col-12 well">
    <a href="/profile/{{$comment->user_id}}"><strong>{{$comment->user->name}}</strong></a> <br>
 <span> {{$comment->body}} </span> <br>
 
 <div class="d-flex align-items-center">
  
  <span> {{$comment->likecomment->count()}}    </span>
 <form method="POST" action="/likecomment">
   @csrf
   <input name="comment_id" type="hidden" value="{{$comment->id}}">
   <button class="text-primary" style="background-color: #F9FAFC; border: none; ">Like</button>
 </form>
<span>·  &nbsp</span>
<span>{{$comment->reply->count()}}</span>
<span>&nbsp</span>
 <a href="/reply/{{$comment->id}}">Reply</a>
 </div>
 <hr>
 </div>
  @endforeach
</div>


</div>

@endsection
