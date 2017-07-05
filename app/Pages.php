<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'permalinks', 'title', 'description', 'status'
    ];

    public function photos()
    {
        return $this->hasMany(PagesPhotos::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
