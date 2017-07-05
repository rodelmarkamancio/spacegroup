<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagesPhotos extends Model
{
    protected $fillable = ['page_id', 'filename'];
 
    public function photo()
    {
        return $this->belongsTo(Pages::class);
    }
}
