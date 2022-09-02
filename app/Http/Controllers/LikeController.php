<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post,Request $request)
    {
        if(!$post->likedBy($request->user()))
        {
            $post->likes()->create([
                'user_id' => $request->user()->id,
                'type' => 'like'
            ]);
        }
        else
        {
            $request->user()->likes()->where('post_id',$post->id)->delete();
        }

        return back();
    }

    // public function destroy(Post $post,Request $request)
    // {
    //     $request->user()->likes()->where('post_id',$post->id)->delete();

    //     return back();
    // }

    public function unlike(Post $post,Request $request)
    {
        if(!$post->likedBy($request->user()))
        {
            $post->likes()->create([
                'user_id' => $request->user()->id,
                'type' => 'unlike'
            ]);
        }
        else
        {
            $request->user()->likes()->where('post_id',$post->id)->delete();
        }

        return back();
    }
}
