<?php

namespace App\Providers;

use App\Mixins\StrMixins;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \ReflectionException
     */
    public function boot()
    {
        // Order matters: The partNumber method in StrMixins class will take over Str::macro('partNumber'... due to
        // the fact that mixin is declared after it.
        // If you want Str::macro('partNumber'... prevail over StrMixins, simply set the second mixin argument to false.
        // in Str::mixin(new StrMixins());

        // Custom macro extending Laravel Str class
        Str::macro('partNumber', function ($part) {
            return 'XYZ-' . substr($part, 0, 3) . '-' . substr($part, 3);
        });

        // StrMixins class which contain all Str custom macros
        Str::mixin(new StrMixins(), false);

        ResponseFactory::macro('errorJson', function ($message = 'Default error message', $errorCode = 100) {
           return [
               'error' => $message,
               'code' => $errorCode
           ];
        });
    }
}
