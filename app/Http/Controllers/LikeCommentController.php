<?php

namespace App\Http\Controllers;

use App\LikeComment;
use Illuminate\Http\Request;

class LikeCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $data = request()->validate([
          'comment_id' => 'required'
          ]);
        if(LikeComment::where('user_id', auth()->id())->where('comment_id', request('comment_id'))->exists()){
          
        }
        else{
        auth()->user()->LikeComment()->create($data);
        }*/
        $data = request()->validate([
          'comment_id' => 'required'
          ]);
        auth()->user()->likecomment()->toggle($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LikeComment  $likeComment
     * @return \Illuminate\Http\Response
     */
    public function show(LikeComment $likeComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LikeComment  $likeComment
     * @return \Illuminate\Http\Response
     */
    public function edit(LikeComment $likeComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LikeComment  $likeComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LikeComment $likeComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LikeComment  $likeComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LikeComment $likeComment)
    {
        //
    }
}
