<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

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
    protected $guarded = ['id','created_at', 'updated_at','deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Http\Models\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Http\Models\Tag');
    }

    public function tagList()
    {
        return $this->tags()->get()->implode('name', ', ');
    }
}
