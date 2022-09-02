<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    public function index()
    {
        // $data['posts'] =Post::latest()
        //     ->with(['category','author'])
        //     ->when(isset(request()->search), function($query){
        //         return $query->where('title', 'like', '%' . request()->search . '%')
        //         ->orwhere('body', 'like', '%' . request()->search . '%');
        //     })
        //     ->get();

        // $data['categories'] = Category::all();

        $posts = Post::latest()
            ->with(['category','author'])
            ->filter(request(['search','category','author']))
            ->paginate(5)->withQueryString();

        return view('posts.index',[
            'posts' => $posts,
        ]);

    }

    public function show(Post $post)
    {
        return view('posts.show',[
        "post" => $post
        ]);
    }
}
