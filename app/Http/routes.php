<?php

// Application routes
Route::group(['namespace' => 'Application', 'middleware' => 'app'], function()
{
    Route::get('/', ['as' => 'root', 'uses' => 'HomeController@index']);
    Route::get('article/{article}',  ['as' => 'article', 'uses' => 'ArticleController@index']);
    Route::get('page/{page}',  ['as' => 'page', 'uses' => 'PageController@index']);
    Route::get('category/{category}',  ['as' => 'category', 'uses' => 'CategoryController@index']);
    Route::post('language/change', ['as' => 'app.language.change' , 'uses' => 'LanguageController@postChange']);
});

// Auth routes
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function()
{
    Route::get('/', ['as' => 'auth.root', 'uses' => 'AuthController@getLogin']);
    Route::get('login',  ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);
});

// Password routes
Route::group(['prefix' => 'password', 'namespace' => 'Auth'], function()
{
    Route::get('email',  ['as' => 'password.email', 'uses' => 'PasswordController@getEmail']);
    Route::post('email', ['as' => 'password.email', 'uses' => 'PasswordController@postEmail']);
    Route::get('reset/{token}',  ['as' => 'password.reset', 'uses' => 'PasswordController@getReset']);
    Route::post('reset', ['as' => 'password.reset', 'uses' => 'PasswordController@postEmail']);
});

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::get('user/table', ['as'=>'admin.user.table', 'uses'=>'UserController@getDatatable']);
    Route::get('article/table', ['as'=>'admin.article.table', 'uses'=>'ArticleController@getDatatable']);
    Route::get('category/table', ['as'=>'admin.category.table', 'uses'=>'CategoryController@getDatatable']);
    Route::get('language/table', ['as'=>'admin.language.table', 'uses'=>'LanguageController@getDatatable']);
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/', ['as' => 'admin.root', 'uses' => 'DashboardController@index']);
        Route::resource('language', 'LanguageController');
        Route::post('language/change', ['as' => 'admin.language.change' , 'uses' => 'LanguageController@postChange']);
        Route::resource('user', 'UserController');
        Route::resource('article', 'ArticleController');
        Route::resource('category', 'CategoryController');
        Route::resource('page', 'PageController');
        Route::post('page/order', ['as' => 'admin.page.order' , 'uses' => 'PageController@postOrder']);
        Route::get('setting', ['as' => 'admin.setting.index', 'uses' => 'SettingController@getSettings']);
        Route::patch('setting/{setting}', ['as' => 'admin.setting.update', 'uses' => 'SettingController@patchSettings']);
    });
});