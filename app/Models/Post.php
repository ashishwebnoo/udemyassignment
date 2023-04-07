<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    protected $fillables = ['title', 'content'];

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function scopeLatest(Builder $query)
    {
    	return $query->orderBy(static::CREATED_AT, 'desc');
    }
}
