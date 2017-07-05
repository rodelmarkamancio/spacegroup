<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function menuLists()
    {
        return $this->hasMany(MenuLists::class);
    }
}
