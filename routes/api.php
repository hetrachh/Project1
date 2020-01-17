<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/product', 'ProductController');
Route::post('/user', 'Auth\RegisterController@create');
Route::resource('/company', 'CompanyController');
Route::resource('/admin', 'AdminController');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/users', 'Auth\LoginController@user');
Route::resource('/product', 'ProductController');
Route::group(['middleware' => 'auth:api'], function () {
	Route::get('/users', 'Auth\LoginController@user');
	Route::post('/login', 'Auth\LoginController@login');
});
