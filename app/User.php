<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username',  'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
	parent::boot();

	static::created(function($user){
	$user->profile()->create([
		'title' => $user->name ]);

	});

    }

    public function profile(){
	return $this->hasOne(Profile::class);
    }

    public function posts(){
	return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }
    
    public function comment(){
      return $this->hasMany(Comment::class);
    }
    
    public function reply(){
      return $this->hasMany(Reply::class);
    }
    
  /*  public function likepost(){
      return $this->hasMany(LikePost::class);
    }*/
    
    public function likecomment(){
      return $this->belongsToMany(Comment::class);
    }
    
    public function follow(){
      return $this->belongsToMany(Post::class);
    }
}
