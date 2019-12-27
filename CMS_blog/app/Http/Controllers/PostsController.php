<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostsRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
//        upaload the image to storage
//        dd($request->image->store('posts'));
        $image = $request->image->store('posts');

//        create the post
        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'content'=>$request->input('content'),
            'image'=>$image
        ]);
//        flash message
        session()->flash('success','Post created successfully');
//        redirect user
        return redirect(route('posts.index'));
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
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
//        it works with soft delete
        if($post->trashed()){
            $post->forceDelete();
            session()->flash('success','Post successfully Deleted. ):');
        }else {
            $post->delete();
            session()->flash('success', 'Post trash successfully.');
        }
        return redirect(route('posts.index'));
    }

    /**
     * It displys all trashed data.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed(){
        $alltrash = Post::withTrashed()->get();
        return view('posts.index')->with('posts',$alltrash);
    }
}
