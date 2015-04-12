<?php

// Application routes
Route::get('/', ['as' => 'root', 'uses' => 'HomeController@index']);


// TODO: Change implicit routing
Route::controllers([
    'password' => 'Auth\PasswordController'
]);


// Auth routes
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function()
{
    Route::get('/', ['as' => 'auth.root', 'uses' => 'AuthController@getLogin']);
    Route::get('login',  ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);
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
        Route::resource('user', 'UserController');
        Route::resource('article', 'ArticleController');
        Route::resource('category', 'CategoryController');
        Route::resource('page', 'PageController');
        Route::get('settings', ['as' => 'admin.settings', 'uses' => 'SettingController@index']);
        // TinyMCE route for Filemanager
        Route::controller('filemanager', 'FileController');
    });
});