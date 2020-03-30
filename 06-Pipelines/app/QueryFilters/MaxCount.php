<?php
/**
 * Created by PhpStorm.
 * User: fschettino
 * Date: 29/03/20
 * Time: 12:31
 */

namespace App\QueryFilters;

class MaxCount extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->take(request($this->filterName()));
    }
}
