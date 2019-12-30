<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePostsRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifideCategoryCount')->only(['create','store']);
    }
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
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        // dd($request->all());
//        upaload the image to storage
//        dd($request->image->store('posts'));
        $image = $request->image->store('posts');
 
//        create the post
        $post = Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'content'=>$request->input('content'),
            'image'=>$image,
            'published_at'=>$request->input('published_at'),
            'category_id' => $request->input('category'),

        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }
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
    public function edit(Post $post)
    {
        // dd($post->tags->pluck('id')->toarray());
        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        

        $data = $request->only(['title','description','published_at','content']);

        // check if new image

        if($request->hasfile('image')){
            // upload it
            $new_image = $request->image->store('posts');
            // delete old one
            $post->deleteImage();
            
            // new image address save in data .
            $data['image'] = $new_image;
        }

        if($request->tags){
            // updated tags table
            $post->tags()->sync($request->tags);
        }
        
        // update attribute
        $post->update($data);
        // flash message
        session()->flash('success','Post Updated Successfully. :)');
        // redirect user

        return redirect(route('posts.index'));
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

//            delete image from storage file
            $post->deleteImage();

            $post->forceDelete();
            session()->flash('success','Post successfully Deleted. ):');
        }else {
//            soft delete.
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
        $alltrash = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$alltrash);
    }


    /**
     * It restore data from trash in actully database
     *
     * @param Post $post
     * @return void
     */
    // public function restorePost(Post $post){

        
    //     $post->restore();

    //     session()->flash('success','Post restored successfully.');

    //     return redirect(route('posts.index'));
    // }

    public function postRestore($id){
             
        Post::onlyTrashed()->where('id',$id)->restore();
        // $post->restore();

       session()->flash('success','Post restored successfully.');

        return redirect(route('posts.index'));
    }

   
}
