<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = [];
	
	public function user(){
	return $this->belongsTo(User::class);
	}
	
	public function comment(){
	  return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
	}
	
	public function likepost(){
	  return $this->hasMany(LikePost::class);
	}
	
	public function follow(){
	  return $this->belongsToMany(User::class);
	}
	
	
}
