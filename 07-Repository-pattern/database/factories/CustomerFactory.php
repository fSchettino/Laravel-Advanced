<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {

    $user = factory(App\User::class)->create();

    return [
        'user_id' => $user->id,
        'name' => $user->name,
        'active' => random_int(0, 1)
    ];
});
