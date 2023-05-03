<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    
// put the data in cache for lifetime
    public function getUsers($foo, $bar)
    {
        $users = User::query()
            ->where('foo', $foo)
            ->where('bar', $bar)
            ->get();

        Cache::forever("user_query_results_foo_{$foo}_bar_{$bar}", $users);

        return $user;
    } 

    // put the data in cache for a given time

    public function getUsers($foo, $bar)
    {
        $users = User::query()
            ->where('foo', $foo)
            ->where('bar', $bar)
            ->get();

        Cache::put("user_query_results_foo_{$foo}_bar_{$bar}", $users, now()->addMinutes(10));

        return $users;
    }

    // return data if the cache key exist

    public function getUsers($foo, $bar)
    {
        $cacheKey = "user_query_results_foo_{$foo}_bar_{$bar}";

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $users = User::query()
            ->where('foo', $foo)
            ->where('bar', $bar)
            ->get();

        Cache::put($cacheKey, $users, now()->addMinutes(10));

        return $users;
    }
 
    //return and store data in laravel default cache remember  

    public function getUsers($foo, $bar)
    {
        return Cache::remember("user_query_results_foo_{$foo}_bar_{$bar}", now()->addMinutes(10), function () use ($foo, $bar) {
            return User::query()
                ->where('foo', $foo)
                ->where('bar', $bar)
                ->get();
        });
    }

public function getUsers($foo, $bar)
{
    return Cache::store('array')->remember("user_query_results_foo_{$foo}_bar_{$bar}", function () use ($foo, $bar) {
        return User::query()
            ->where('foo', $foo)
            ->where('bar', $bar)
            ->get();
    });
}

}
