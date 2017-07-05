<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class PostsPhoto extends Model
{
    protected $fillable = ['post_id', 'filename'];
 
    public function photo()
    {
        return $this->belongsTo(Post::class);
    }
}
