<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category() {

    	return $this->belongsTo('blog\Category', 'category_id');
    }

    public function tags() {

        return $this->belongsToMany('blog\Tag');
    }

    public function comments() {

    	return $this->hasMany('blog\Comment');
    }
}
