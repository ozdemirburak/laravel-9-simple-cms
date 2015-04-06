<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('auth/login',  array('as' => 'login', 'uses' => 'Auth\AuthController@getLogin'));
Route::post('auth/login', array('as' => 'login', 'uses' => 'Auth\AuthController@postLogin'));
Route::get('auth/logout', array('as' => 'login', 'uses' => 'Auth\AuthController@getLogout'));

Route::controllers([
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', 'Admin\DashboardController@index');
});