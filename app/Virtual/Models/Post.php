<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Post",
 *     description="Post model",
 *     @OA\Xml(
 *         name="Post"
 *     )
 * )
 */
class Post
{

    /**
     * @OA\Property(
     *      title="title",
     *      description="Title of the post",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="slug",
     *      description="Slug of the new post",
     *      example="This is new slug"
     * )
     *
     * @var string
     */
    public $slug;

    /**
     * @OA\Property(
     *      title="excerpt",
     *      description="excerpt of the new post",
     *      example="This is new excerpt"
     * )
     *
     * @var string
     */
    public $excerpt;
    
    /**
     * @OA\Property(
     *      title="body",
     *      description="body of the new post",
     *      example="This is new body"
     * )
     *
     * @var string
     */
    public $body;


    /**
     * @OA\Property(
     *      title="thumbnail",
     *      description="thumbnail of the new post",
     *      example="This is new thumbnail"
     * )
     *
     * @var string
     */
    public $thumbnail;

    /**
     * @OA\Property(
     *     title="category_id",
     *     description="category id for the post",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $category_id;

    /**
     * @OA\Property(
     *     title="user_id",
     *     description="user id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $user_id;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

}