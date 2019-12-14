<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * For middleware
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $posts = Post::orderBy('id','desc')->limit(6)->get();
        $posts = Post::orderBy('id','desc')->paginate(3);

//        pagination

        return  view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        validate
        $this->validate($request,[
            'title' => 'required|max:50',
            'body' => 'required',
        ]);

//        return  'validate';

//        Created Post
        $input = $request->all();
//        return $input;

        $post = new Post();
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->user_id = auth()->user()->id;
        $post->save();
//        $post->save(['title'=>$input->title, 'body'=>$input->body]);

        session()->flash('success', 'Posts Created');
        return redirect('/posts');

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
        $post =  Post::findOrFail($id);


        return  view('posts.show',compact('post'));
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
        $post = Post::findOrFail($id);
//        Check for Correct user

        if(auth()->user()->id != $post->user_id){
            return  redirect('posts')->with('error',"Unauthorized page");
        }
        return view('posts.edit',compact('post'));
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

        $this->validate($request,[
            'title' => 'required|max:50',
            'body' => 'required',
        ]);

//        Created Post
        $input = $request->all();
//        return $input;

        $post = Post::findOrFail($id);
        $post->title = $input['title'];
        $post->body = $input['body'];

        $post->save();
//        $post->save(['title'=>$input->title, 'body'=>$input->body]);

        session()->flash('success', 'Posts Updated');
        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

//        Check for Correct user
        if(auth()->user()->id != $post->user_id){
            redirect('posts')->with('error',"Unauthorized page");
        }

        $post->delete();

        session()->flash('success','Post Successfully Deleted.');
        return  redirect('/posts');
    }
}
