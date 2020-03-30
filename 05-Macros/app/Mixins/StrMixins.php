<?php
/**
 * Created by PhpStorm.
 * User: fschettino
 * Date: 26/03/20
 * Time: 20:12
 */

namespace App\Mixins;

class StrMixins
{
    public function partNumber()
    {
        return function ($part) {
            return 'ABC-' . substr($part, 0, 3) . '-' . substr($part, 3);
        };
    }

    public function prefix()
    {
        return function ($string, $prefix = 'ABC-') {
            return $prefix . $string;
        };
    }
}
