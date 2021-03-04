<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);
        $id = Auth::id();
        $data = Post::where('user_id', $id)->get();
        return view('post.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $data = Category::all();
        $tag = Tag::all();
        return view('post.create', compact('data', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        $post = new Post;
        $user = Auth::id();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        $post->user_id = $user;
        $tag = $request->input('tag');
        $post->save();
        $post->tags()->sync($tag);
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Post::class);
        $data = Post::find($id);
        $check = $data->tags;
        $tag = Tag::all();
        $category = Category::all();


        return view('post.edit', compact('data', 'category', 'tag', 'check'));
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
        $this->authorize('update', Post::class);
        $data = Post::find($id);
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->category_id = $request->input('category_id');
        $tag = $request->input('tag');
        $data->save();
        $data->tags()->sync($tag);
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Post::class);
        Post::find($id)->delete();
        return redirect('post');
    }
}
