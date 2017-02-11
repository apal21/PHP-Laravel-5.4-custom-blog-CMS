<?php

namespace blog\Http\Controllers;

use Illuminate\Http\Request;
use blog\Http\Controllers\Controller;
use blog\Post;
use blog\Tag;
use Illuminate\Support\Facades\Auth;
use Session;
use blog\Category;
use Purifier;
use Image;
use Storage;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|max:100|unique:posts,slug',
                'category_id' => 'required|integer',
                'body'  => 'required',
                'featured_image' => 'sometimes|image'
            ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->author = Auth::user()->name;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body, "youtube");

        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time().'-'.$image->getClientOriginalName();
            $location = public_path('images/'.$filename);
            Image::make($image)->save($location);

            $post->image = $filename;
        }

        $post->save();

        if ($request->tags == null) {
            $post->tags()->sync([], false);    
        } else {
            $post->tags()->sync($request->tags, false);
        }

        Session::flash('success', 'The blog post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tagsForThisPost = json_encode($post->tags->pluck('id'));
        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('posts.edit')->with('post', $post)->with('categories', $cats)->with('tags', $tags2);
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
        $post = Post::find($id);

        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => "required|alpha_dash|max:100|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body'  => 'required',
                'featured_image' => 'image'
            ));

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'), "youtube");

        if($request->hasFile('featured_image')) {

            $image = $request->file('featured_image');
            $filename = time().'-'.$image->getClientOriginalName();
            $location = public_path('images/'.$filename);
            Image::make($image)->save($location);

            $oldFilename = $post->image;

            $post->image = $filename;

            //comment this if you don't want to delete existing image
            Storage::delete($oldFilename);
        }

        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags, false);
        } else {
            $post->tags()->sync([]);
        }

        Session::flash('success', 'The blog post was successfully updated!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        //comment the code below if you don't want to delete the image even after the deleting the post
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'The post was deleted');
        return redirect()->route('posts.index');
    }
}
