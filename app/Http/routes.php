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

// Tinymce elfinder integration
Route::get('elfinder', [ 'as' => 'elfinder', 'middleware' => 'auth', 'uses' => 'Barryvdh\Elfinder\ElfinderController@showTinyMCE4'] );