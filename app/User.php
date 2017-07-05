<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use HttpOz\Roles\Traits\HasRole;
use HttpOz\Roles\Contracts\HasRole as HasRoleContract;

class User extends Authenticatable implements HasRoleContract
{
    use Notifiable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    { 
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function pages()
    {
        return $this->hasMany(Pages::class);
    }

    public function postCategory()
    {
        return $this->hasMany(Category::class);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    public function pagePublish(Pages $pages)
    {
        $this->pages()->save($pages);
    }
}
