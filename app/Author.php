<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
    //
    public function categories()
    {
        return $this->belongsToMany(Category::class,AuthorCategory::class,'author_id','category_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id', 'id');
    }
}
