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

Route::any('article/{action}',function(\blog\Http\Controllers\Article $index, $action,\Illuminate\Http\Request $request ){
		return $index->$action($request);
    });
Route::any('/login', 'Login@index');
Route::any('/regist', 'Login@regist');
Route::any('/', 'Login@index');
Route::any('/logout', 'Login@logout');

