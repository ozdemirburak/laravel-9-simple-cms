<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'root', 'uses' => 'PageController@getIndex']);
Route::get('a/{aSlug}', ['as' => 'article', 'uses' => 'PageController@getArticle']);
Route::get('p/{pSlug}', ['as' => 'page', 'uses' => 'PageController@getPage']);
Route::get('c/{cSlug}', ['as' => 'category', 'uses' => 'PageController@getCategory']);
Route::get('sitemap.xml', ['as' => 'sitemap', 'uses' => 'PageController@getSitemap']);
