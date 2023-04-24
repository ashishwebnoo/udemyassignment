<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Comment extends Model
{
	protected $fillable = ['comment', 'post_id'];

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}
