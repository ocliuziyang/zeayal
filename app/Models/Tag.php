<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['fid', 'name', 'description', 'thumbnail'];


    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'tag_post', 'tag_id', 'post_id');
    }
}
