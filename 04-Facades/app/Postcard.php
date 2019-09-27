<?php


namespace App;


class Postcard
{
//    public  static function any() {
//        dump('inside');
//    }

    protected static function resolveFacade($name)
    {
        return app()->make($name);
    }

    public static function __callStatic($method, $arguments)
    {
//        dump(app()['Postcard']);
//        dump(app()[PostcardSendingService::class]);
//        dump(app()->make(PostcardSendingService::class));
//        dump($arguments);

        return (self::resolveFacade('Postcard'))
            ->$method(...$arguments);
    }
}
