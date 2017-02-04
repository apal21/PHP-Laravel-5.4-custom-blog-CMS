<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category() {

    	return $this->belongsTo('blog\Category', 'category_id');
    }
}
