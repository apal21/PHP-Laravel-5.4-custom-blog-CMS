<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post() {

    	return $this->belongsTo('blog\Post');
    }
}
