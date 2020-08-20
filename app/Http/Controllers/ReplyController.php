<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
class ReplyController extends Controller
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
    public function create(\App\Comment $comment, $id, Reply $reply)
    {
      //$rep = \App\Comment::findOrFail($id);
     /* $ly = Reply::where('comment_id', $id)->first();
      dd($ly->user);*/
    $user = \App\User::first();
    
     $comment = $comment->where('id', $id)->first();
    $replies = Reply::where('comment_id', $id)->get();

        return view('Replies.reply', compact('comment', 'replies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
          'comment_id' => 'required',
          'body' => 'required'
          ]);
          auth()->user()->reply()->create($data);
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
       //$rep =  Reply::where('comment_id', 10)->first();
       $comment = \App\Comment::get();
       $com = $comment->reply;
       dd($com);
       //dd($rep->user->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
