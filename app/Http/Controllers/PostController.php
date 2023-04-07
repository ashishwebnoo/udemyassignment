<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function show($id)
    {
    	return view('post.show', ['post' => Post::with(['comments' => function($query){
    			return $query->latest();
    	      }])->findOrFail(),
          ]);
    }
}
