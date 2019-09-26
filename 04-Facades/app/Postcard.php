<?php


namespace App;


class Postcard
{
//    public  static function any() {
//        dump('inside');
//    }

    public static function __callStatic($method, $arguments)
    {
        dump(app()[PostcardSendingService::class]);
        dump(app()->make(PostcardSendingService::class));
        dump($method);
    }
}
