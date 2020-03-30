<?php
/**
 * Created by PhpStorm.
 * User: fschettino
 * Date: 29/03/20
 * Time: 20:05
 */

namespace App\Http\Repositories;

interface CustomerRepositoryInterface
{
    public function list();

    public function getById($customerId);
}
