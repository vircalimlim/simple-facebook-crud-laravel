<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function __construct(){
	return $this->middleware('auth');
	}
    public function index()
    {
        //
	    //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $data = request()->validate(
		['caption' => 'required', 'image' => ['required', 'image']]
	    );
	    $imgPath = request('image')->store('uploads', 'public');
	    auth()->user()->posts()->create([
		    'caption' => $data['caption'],
		    'image' => $imgPath
	    ]);
	   
	    // dd(request()->all());
	return redirect('/profile/'. auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( \App\Post $user)
    {
      
        $id = Auth::id();
        
        $profile = \App\Profile::where('user_id', $id)->first();
        //$replies = \App\Reply::where('comment_id', 19)->get();
       // dd(count($replies));
        //dd(auth()->user()->id);
        return view('Posts.show', compact('user', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Post $user)
    { 
      $this->authorize('delete', $user);
       $user->delete();
       return redirect('/profile/'.$user->user_id);
      
      
    }
}
