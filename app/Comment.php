<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;
class Comment extends Model
{
  protected $guarded = [];
    public function user(){
      return $this->belongsTo(User::class);
    }
    public function post(){
      return $this->belongsTo(Post::class);
    }
    
    public function reply(){
      return $this->hasMany(Reply::class);
    }
    
   public function likecomment(){
      return $this->belongsToMany(User::class);
    }
}
