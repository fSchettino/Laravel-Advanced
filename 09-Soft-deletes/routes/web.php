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

Route::get('/posts', 'PostController@all');
Route::get('/posts-except-deleted', 'PostController@allExceptSoftDeleted');
Route::get('/deleted-posts', 'PostController@allSoftDeleted');
Route::get('/delete-post/{id}', 'PostController@softDelete');
Route::get('/restore-post/{id}', 'PostController@restore');
Route::get('/force-delete-post/{id}', 'PostController@forceDelete');
