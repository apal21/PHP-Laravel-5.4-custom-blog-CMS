<?php

namespace blog\Http\Controllers;

use Illuminate\Http\Request;
use blog\Comment;
use blog\Post;
use Session;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => 'store']);
    }
    
    public function store(Request $request, $post_id)
    {
        $this->validate($request, [
                'name' => 'required|max:40',
                'email' => 'required|email|max:50',
                'comment' => 'required|max:2000'
            ]);

        $post = Post::find($post_id);

        $comment = new Comment;

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;

        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Successfully posted this comment');

        return redirect()->route('blog.single', [$post->slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')->with('comment', $comment);
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
        $comment = Comment::find($id);

        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|max:50',
            'comment' => 'required|max:2000'
            ]);

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;

        $comment->save();

        Session::flash('success', 'Comment Successfully Updated');

        return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id) {

        $comment = Comment::find($id);
        return view('comments.delete')->with('comment', $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('success', 'Comment Successfully Deleted');

        return redirect()->route('posts.show', $post_id);
    }
}
