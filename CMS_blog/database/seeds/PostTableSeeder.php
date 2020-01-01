<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name'=>'Steve Smith',
            'email'=>'smith@gmail.com',
            'password'=>Hash::make('abc')
            
        ]);
        $user2 = User::create([
            'name'=>'Sara Smith',
            'email'=>'sara@gmail.com',
            'password'=>Hash::make('abc')
            
        ]);
        $user3 = User::create([
            'name'=>'Alex Costa',
            'email'=>'alex@gmail.com',
            'password'=>Hash::make('abc')
            
        ]);
        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Marketing'
        ]);
        $category3 = Category::create([
            'name' => 'Design'
        ]);


        // post create
        $post1 = Post::create([
            'title'=>"We relocated our office to a new designed garage",
            'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
            'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting 
             ",
            'category_id'=>$category1->id,
            'user_id'=>$user1->id,
            'image' => 'posts/1.jpg'
        ]);
        $post2 = Post::create([
            'title'=>"We relocated our office to a new designed garage",
            'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
            'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting 
             ",
            'category_id'=>$category2->id,
            'user_id'=>$user2->id,
            'image' => 'posts/2.jpg'
        ]);
        $post3 = Post::create([
            'title'=>"We relocated our office to a new designed garage",
            'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
            'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting 
             ",
            'category_id'=>$category3->id,
            'user_id'=>$user3->id,
            'image' => 'posts/3.jpg'
        ]);

        // Some tag
        $tag1 = Tag::create([
            'name'=>'job'
        ]);
        $tag2 = Tag::create([
            'name'=>'customers'
        ]);
        $tag3 = Tag::create([
            'name'=>'record'
        ]);

        // tag attached each post
        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag1->id,$tag3->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
    }
}
