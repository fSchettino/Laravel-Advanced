<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public  function  create()
    {
        // There is no need to fetch channels here and pass them to view cause channels variable has been shared in CustomServiceProvider
        /*$channels = Channel::orderBy('name')->get();
        return view('post.create', compact('channels'));*/

        return view('post.create');
    }
}
