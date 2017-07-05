<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['post_id', 'user_id', 'category_name', 'category_slug'];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function addCategory($posts)
    {
        $user_id = auth()->user()->id;
        Category::create([
            'user_id' => auth()->user()->id,
            'category_name' => request('category_name'),
            'category_slug' => str_replace(" ", "-", request('category_slug'))
        ]);
    }
}
