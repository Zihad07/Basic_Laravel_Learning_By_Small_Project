<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post){
        return view('blog.show')->with('post',$post);
    }

    public function category(Category $category){

        $search = request()->query('search');
        if($search){
            $posts = $category->posts()->where('title','LIKE',"%{$search}%")->simplePaginate(2);
        }else{
            $posts = $category->posts()->simplePaginate(2);
        }
        return view('blog.category')->with('category',$category)
        ->with('posts',$posts)
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ;
    }


    public  function tag(Tag $tag){
        return view('blog.tag')
        ->with('tag',$tag)
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ->with('posts',$tag->posts()->simplePaginate(2))
        ;
    }
}
