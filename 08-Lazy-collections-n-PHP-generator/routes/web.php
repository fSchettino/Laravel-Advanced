<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

Route::get('/', function () {
    return view('welcome');
});

Route::get('lazy', function () {
    $collection = Collection::times(1000000)
        ->map(function ($number) {
            return pow(2, $number);
        })
        ->all();

    // LazyCollection set "out of memory" threshold at a much higher level
    // Allows to manage huge sets of data without run out of memory
    $collection = LazyCollection::times(1000000)
        ->map(function ($number) {
            return pow(2, $number);
        })
        ->all();

    // Fetching models from database
    User::all();

    // Fetching from database using lazy collections
    User::cursor();

    return 'Done!';
});

Route::get('/generator', function () {
    function happyFunction($string) {
        return $string;
    }

    function happyFunctionUsingGenerator($string) {
        // Yield is an alternative way of returning data
        // Unlike return, yield doesn't return immediately, it waits until you actually instruct the application to return
        // Yield is a special Generator class it gets back a PHP generator object type
        yield $string;
    }

    function yieldGeneratorObjectExecutionPractice() {
        dump('1');
        // Yield stops the function execution
        yield "One";
        dump('2');

        dump('3');
        yield "Two";
        dump('4');

        dump('5');
        yield "Three";
        dump('6');
    }

    //return happyFunction('Super Happy!');

    // get_class method returns object class type
    //return get_class(happyFunctionUsingGenerator('Super Happy!'));

    // get_class_methods method returns all object type methods
    //return get_class_methods(happyFunctionUsingGenerator('Super Happy!'));

    /*$return = yieldGeneratorObjectExecutionPractice();

    // current method get current yield returned object value
    dump($return->current());

    // next method jump to next yield statement
    $return->next();

    dump($return->current());

    $return->next();

    dump($return->current());

    $return->next();

    dump($return->current());*/

    // Looping on function
    foreach (yieldGeneratorObjectExecutionPractice() as $result) {

        // Stopping function execution at certain point
        if ($result == 'Two') {
            return;
        }

        dump($result);
    }
});
