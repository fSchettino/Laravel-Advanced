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

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

Route::get('/', function () {

    dump(Str::partNumber(123456789));
    dd(Str::prefix(123456789, 'DEF-'));

    return Response::errorJson('Macro error message', 404);

    return view('welcome');
});
