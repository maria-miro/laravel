<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','remember_token','created_at','updated_at'];

    public function articles()
    {
        return $this->hasMany('App\Http\Models\Article');
    }
}
