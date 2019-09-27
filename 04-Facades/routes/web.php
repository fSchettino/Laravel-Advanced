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

use App\Postcard;
use App\PostcardSendingService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('postcard', function () {

    $postcardService = new PostcardSendingService('it', 4, 4);
    $postcardService->hello('hello from Fabio Schettino Italy', 'test@test.com');
});

Route::get('facades', function () {
    Postcard::hello('hello from Fabio Schettino Italy, facade version', 'test@test.com');
});
