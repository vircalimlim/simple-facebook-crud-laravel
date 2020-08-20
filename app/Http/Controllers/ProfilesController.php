<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
  public function try(){
   // $user = auth::user();
    $user = User::orderBy('id', 'desc')->where('email', 'Test@gmail.com')->first();
    $name = request('name');
    return view('try', compact('user', 'name'));
  }
  public function red(){
    return redirect('/')->with('msg', 'This is a session');
  }
  
	public function index($user) {
		$user = User::findOrFail($user);
		return view('profile' , ['user' => $user]);
	}

	public function edit(User $user){
	  
		$this->authorize('update', $user->profile);
		return view('Profiles.edit', compact('user'));
	}

	public function update(User $user){
	  
	$data = request()->validate([
		'title' => 'required',
		'description' => 'required',
		'url' => 'url',
		'image', '' ]);

	if(request('image')){
	$imgPath = request('image')->store('uploads', 'public');
	$imgArray = ['image' => $imgPath];

	}

	auth()->user()->profile->update(array_merge($data, $imgArray ?? []));

	return redirect("/profile/$user->id");

	}

}
