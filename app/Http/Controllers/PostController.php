<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(2);
        return view('posts.index', [
            'posts'=> $posts
         ]);

    }

    public function submit(Request $request){

        $this->validate($request, [
            'post_content'=> 'required'
        ]);

       // Post::create([
       //     'user_id' =>auth()->user_id(),
       //     'body' => $request->body
       // ]

        //)
        $request->user()->posts()->create(
            [
                'post_content' => $request->post_content
             ]
            );

        return back();
    }
}
