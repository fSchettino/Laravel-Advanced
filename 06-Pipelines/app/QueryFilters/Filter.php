<?php
/**
 * Created by PhpStorm.
 * User: fschettino
 * Date: 29/03/20
 * Time: 13:13
 */

namespace App\QueryFilters;

use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    public function handle($request, Closure $next)
    {
        if (! request()->has($this->filterName())) {
            return $next($request);
        }

        $builder = $next($request);

        return $this->applyfilter($builder);
    }

    protected abstract function applyFilter($builder);

    protected function filterName()
    {
        return Str::snake(class_basename($this));
    }
}
