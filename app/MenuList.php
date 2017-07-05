<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuList extends Model
{
    protected $fillable = ['sort_id', 'page_id', 'menu_id'];
    // protected $table = "menu_lists";

    public function menu() 
    {
        return $this->belongsTo(Menu::class);
    }
}
