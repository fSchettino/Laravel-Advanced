<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index()
    {
        // There is no need to fetch channels here and pass them to view cause channels variable has been shared in CustomServiceProvider
        /*$channels = Channel::orderBy('name')->get();
        return view('channel.index', compact('channels'));*/

        return view('channel.index');
    }
}
