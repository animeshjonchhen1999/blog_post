<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Get(
     *      path="/api/posts",
     *      operationId="displayPosts",
     *      tags={"posts"},
     *      summary="Get list of posts",
     *      description="Returns list of posts",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        return new JsonResponse(Post::all());
    }


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



     /**
     * @OA\Post(
     *      path="/api/posts",
     *      operationId="storePost",
     *      tags={"posts"},
     *      summary="Store new post",
     *      description="",
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"title","slug","excerpt", "body", "category_id", "user_id"},
     *       @OA\Property(property="title", type="string", example="example title"),
     *       @OA\Property(property="slug", type="string",example="example-slug"),
     *       @OA\Property(property="thumbnail", type="file", example="filename"),
     *       @OA\Property(property="excerpt", type="string", example="this is the excerpt of the post"),
     *       @OA\Property(property="body", type="string", example="here is the body of the post"),
     *       @OA\Property(property="category_id", type="integer", example="1"),
     *       @OA\Property(property="user_id", type="integer", example="1"),
     * 
     * 
     *    ),
     * ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Post")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function store(Request $request)
    {
        $attributes = [
            'title' => request('title'),
            'slug' => Str::slug($request->title,'-'),
            'excerpt' => request('excerpt'),
            'thumbnail' => request()->file('thumbnail'),
            'body' => request('body'),
            'user_id' => request('user_id'),
            'category_id' => request('category_id')
        ];

        Post::create($attributes);

        return "CREATED";
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * @OA\Get(
     *      path="/api/posts/{post_id}",
     *      operationId="getPostById",
     *      tags={"posts"},
     *      summary="Get post information",
     *      description="Returns post data",
     *      @OA\Parameter(
     *          name="post_id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function show($id)
    {
        return Post::find($id);
    }

}