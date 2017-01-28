<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User');
    }
}
