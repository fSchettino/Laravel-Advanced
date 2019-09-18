<?php


namespace App\Http\View\Composers;


use App\Channel;
use Illuminate\View\View;

class ChannelsComposer
{
    // A composer class must have a method named "compose", you can have as many methods as you need to calculate data passed to view but "compose" method is mandatory.
    public function compose(View $view)
    {
        $view->with('channels', Channel::orderBy('name', 'desc')->get());
    }
}
