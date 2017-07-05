<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{   
    protected $table = "category_post";

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
