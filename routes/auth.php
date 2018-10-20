<?php

Route::get('login', ['as' => 'auth.login', 'uses' => 'LoginController@showLoginForm']);
Route::post('login', ['as' => 'auth.login.post', 'uses' => 'LoginController@login']);
Route::post('logout', ['as' => 'auth.logout', 'uses' => 'LoginController@logout']);
