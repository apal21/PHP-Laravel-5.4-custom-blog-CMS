<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts() {

    	return $this->hasMany('blog\Post', 'category_id');
    }
}
