<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','remember_token','created_at','updated_at','deleted_at'];

    public function articles()
    {
        return $this->hasMany('App\Http\Models\Article');
    }

    public function comments()
    {
        return $this->hasMany('App\Http\Models\Comment');
    }

    public function role()
    {
        return $this->hasOne('App\Http\Models\Role');
    }

    public function owns($related)
    {     
        return $this->id == $related->user_id;
    }

    public function isAdmin()
    {     
        return $this->role_id === 1;
    }

    public function deleteWithArticles()
    {
        $this->articles()->each(function($article){
            $article->deleteWithComments();
        });
        return $this->delete();       
    }
}
