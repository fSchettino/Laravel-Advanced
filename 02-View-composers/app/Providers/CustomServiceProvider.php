<?php

namespace App\Providers;

use App\Channel;
use App\Http\View\Composers\ChannelsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Option 1 - Sharing channels variable with every view
        // View::share('channels', Channel::orderBy('name')->get());

        // Option 2 - Sharing channels variable among specific views (using wildcard means that you can share data among all views in a specific folder, in this case post folder)
        /*View::composer(['post.*', 'channel.index'], function ($view) {
            $view->with('channels', Channel::orderBy('name', 'desc')->get());
        });*/

        // Option 3 - Dedicated class and partials
        View::composer('partials.channels.*', ChannelsComposer::class);

    }
}
