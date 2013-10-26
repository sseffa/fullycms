<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', array('as' => 'dashboard', function () {

    return View::make('frontend/dashboard');
}));

// article
Route::get('/article', array('as' => 'dashboard.article', 'uses' => 'ArticleController@index'));
Route::get('/article/{id}/show', array('as' => 'dashboard.article.show', 'uses' => 'ArticleController@show'));

// page
Route::get('/page', array('as' => 'dashboard.page', 'uses' => 'PageController@index'));
Route::get('/page/{id}/show', array('as' => 'dashboard.page.show', 'uses' => 'PageController@show'));

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function () {

    Route::get('/', array('as' => 'admin.dashboard', function () {

        return View::make('backend/dashboard')->with('active', 'home');
    }));

    // user
    Route::resource('user', 'App\Controllers\Admin\UserController');
    Route::get('user/{id}/delete', array('as' => 'admin.user.delete', 'uses' => 'App\Controllers\Admin\UserController@confirmDestroy'));

    // blog
    Route::resource('article', 'App\Controllers\Admin\ArticleController');
    Route::get('article/{id}/delete', array('as' => 'article.delete', 'uses' => 'App\Controllers\Admin\ArticleController@confirmDestroy'));

    // page
    Route::resource('page', 'App\Controllers\Admin\PageController');
    Route::get('page/{id}/delete', array('as' => 'page.delete', 'uses' => 'App\Controllers\Admin\PageController@confirmDestroy'));
});

// File manager
Route::get('filemanager/show/{x?}', function () {

    return View::make('backend.filemanager');
})->before('auth.admin');

Route::get('/admin/login', array('as' => 'admin.login', function () {

    return View::make('backend/singin');
}));

Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------
*/

//App::abort(404, 'Page not found');

App::missing(function () {

    return Response::view('errors.missing', array(), 404);
});
