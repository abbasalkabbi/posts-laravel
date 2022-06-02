<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    public function _construct(){
        $this->middleware(['auth']);
    }
    public function store(Post $post,Request $request){
        $post->likes()->create([
            "user_id"=>$request->user()->id
        ]);
        return back();
    }
    public function dstore(Post $post,Request $request){
        $request->user()->likes()->Where("post_id",$post->id)->delete();
        return back();
    }
}
