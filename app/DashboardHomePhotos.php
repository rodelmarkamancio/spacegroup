<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class DashboardHomePhotos extends Model
{
    protected $fillable = [
        'dhomes_photos_id', 'filename'
    ];

    public function photo()
    {
        return $this->belongsTo(DashboardHomeMidContent::class);
    }
}
