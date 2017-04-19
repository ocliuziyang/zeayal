<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'slug', 'description', 'content_raw', 'content_html', 'published_at', 'is_draft', 'author'];
}
