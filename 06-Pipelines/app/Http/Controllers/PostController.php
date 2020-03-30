<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function index()
    {
        /*// Without pipeline
        $posts = Post::query();

        if (request()->has('active')) {
            $posts->where('active', request('active'));
        }

        if (request()->has('sort')) {
            $posts->orderBy('title', request('sort'));
        }

        $posts = $posts->get();*/

        /*// Using pipeline
        $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class
            ])
            ->thenReturn()
            ->get();*/

        // Using pipeline stored in the model class
        $posts = Post::filteredPosts();

        return view('posts.index', compact('posts'));
    }
}
