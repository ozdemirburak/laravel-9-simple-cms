<?php

Route::get('/', ['as' => 'root', 'uses' => 'HomeController@index']);

Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function()
{
    Route::get('/', ['as' => 'auth.root', 'uses' => 'AuthController@getLogin']);
    Route::get('login',  ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::get('user/table', array('as'=>'admin.user.table', 'uses'=>'UserController@getDatatable'));
    Route::get('article/table', array('as'=>'admin.article.table', 'uses'=>'ArticleController@getDatatable'));
    Route::get('category/table', array('as'=>'admin.category.table', 'uses'=>'CategoryController@getDatatable'));
    Route::get('language/table', array('as'=>'admin.language.table', 'uses'=>'LanguageController@getDatatable'));
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/', ['as' => 'admin.root', 'uses' => 'DashboardController@index']);
        Route::resource('language', 'LanguageController');
        Route::resource('user', 'UserController');
        Route::resource('article', 'ArticleController');
        Route::resource('category', 'CategoryController');
        Route::resource('page', 'PageController');
        Route::get('settings', ['as' => 'admin.settings', 'uses' => 'SettingController@index']);
    });
});