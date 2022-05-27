<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(){
        $posts=Post::get();
        
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }
    public function store(Request $request){
        // Validation
        $this->validate($request,[
            'body'=>'required '
        ]);
        // insert post 
        $request->user()->posts()->create([
            'body'=>$request->body
        ]);
        // end 
        return back();
    }
    
}
