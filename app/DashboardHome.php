<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class DashboardHome extends Model
{
    protected $fillable = [
        'head_text_1', 'head_text_2', 'head_text_3', 'head_intro',
        'mid_content_img_1', 'mid_content_img_2', 'mid_content_img_3',
        'mid_content_text_1', 'mid_content_text_2', 'mid_content_text_3',
        'mid_content_desc_1', 'mid_content_desc_2', 'mid_content_desc_3', 
        'mid_content_bg_id', 'mid_content_intro_1', 'mid_content_intro_2'
    ];
}
