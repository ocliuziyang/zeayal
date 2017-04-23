<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    //
    protected $fillable = ['title', 'slug', 'description', 'content_raw', 'content_html', 'published_at', 'is_draft', 'author'];

    public $dates = ['published_at'];


//    public function getPublishedAtAttribute($value)
//    {
//
//        $locale = App::getLocale();
//        $date = $this->asDateTime($value);
//        if ($locale === 'en') {
//            return $date->format('M d, Y');
//        } else if ($locale === 'uk') {
//            return $date->format('M d, Y');
//        } else {
//            return $value;
//        }
//    }
    
}
