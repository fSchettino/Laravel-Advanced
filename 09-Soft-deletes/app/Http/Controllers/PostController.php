<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Post::withTrashed()->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allExceptSoftDeleted()
    {
        return Post::all();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function allSoftDeleted()
    {
        return Post::onlyTrashed()->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function softDelete($id)
    {
        Post::find($id)->delete();
    }

    /**
     * @param $id
     */
    public function restore($id)
    {
        Post::onlyTrashed()->find($id)->restore();
    }

    /**
     * @param $id
     */
    public function forceDelete($id)
    {
        Post::find($id)->forceDelete();
    }
}
