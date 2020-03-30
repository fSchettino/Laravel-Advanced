<?php
/**
 * Created by PhpStorm.
 * User: fschettino
 * Date: 29/03/20
 * Time: 12:31
 */

namespace App\QueryFilters;

class Sort extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->orderBy('title', request($this->filterName()));
    }
}
