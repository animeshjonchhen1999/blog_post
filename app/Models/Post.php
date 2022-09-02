<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'body',
        'slug',
        'excerpt',
        'category_id',
        'user_id',
        'thumbnail'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, fn($query,$search)=>
            $query->where(fn($query)=>
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orwhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? null, fn($query,$category)=>
            $query
                ->whereHas('category', fn($query)=>
                    $query->where('slug', $category)
                    )
        );

        $query->when($filters['author'] ?? null, fn($query,$author)=>
            $query
                ->whereHas('author', fn($query)=>
                    $query->where('username', $author)
                    )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id',$user->id);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    static function likeCount()
    {
        return count((array)self::likes());
    }
}