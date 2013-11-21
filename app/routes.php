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
Route::get('/article/{id}/{slug}', array('as' => 'dashboard.article.show', 'uses' => 'ArticleController@show'));

// tags
Route::get('/tag/{tag}', array('as' => 'dashboard.tag', 'uses' => 'TagController@index'));

// page
Route::get('/page', array('as' => 'dashboard.page', 'uses' => 'PageController@index'));
Route::get('/page/{id}/show', array('as' => 'dashboard.page.show', 'uses' => 'PageController@show'));

// photo gallery
Route::get('/photo_gallery', array('as' => 'dashboard.photo_gallery', 'uses' => 'PhotoGalleryController@index'));
Route::get('/photo_gallery/{id}/show', array('as' => 'dashboard.photo_gallery.show', 'uses' => 'PhotoGalleryController@show'));

// contact
Route::get('/contact', array('as' => 'dashboard.contact', 'uses' => 'FormPostController@getContact'));
Route::post('/contact', array('as' => 'dashboard.contact.post', 'uses' => 'FormPostController@postContact'), array('before' => 'csrf'));

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
    Route::get('article/{id}/delete', array('as' => 'admin.article.delete', 'uses' => 'App\Controllers\Admin\ArticleController@confirmDestroy'));

    // page
    Route::resource('page', 'App\Controllers\Admin\PageController');
    Route::get('page/{id}/delete', array('as' => 'admin.page.delete', 'uses' => 'App\Controllers\Admin\PageController@confirmDestroy'));

    // photo gallery
    Route::resource('photo_gallery', 'App\Controllers\Admin\PhotoGalleryController');
    Route::get('photo_gallery/{id}/delete', array('as' => 'admin.photo_gallery.delete', 'uses' => 'App\Controllers\Admin\PhotoGalleryController@confirmDestroy'));

    // ajax - blog
    Route::post('article/{id}/toggle-publish', array('as' => 'admin.article.toggle-publish', 'uses' => 'App\Controllers\Admin\ArticleController@togglePublish'));

    // ajax - photo gallery
    Route::post('photo_gallery/{id}/toggle-publish', array('as' => 'admin.photo_gallery.toggle-publish', 'uses' => 'App\Controllers\Admin\PhotoGalleryController@togglePublish'));
    Route::post('photo_gallery/{id}/toggle-menu', array('as' => 'admin.photo_gallery.toggle-menu', 'uses' => 'App\Controllers\Admin\PhotoGalleryController@toggleMenu'));

    // ajax - page
    Route::post('page/{id}/toggle-publish', array('as' => 'admin.page.toggle-publish', 'uses' => 'App\Controllers\Admin\PageController@togglePublish'));
    Route::post('page/{id}/toggle-menu', array('as' => 'admin.page.toggle-menu', 'uses' => 'App\Controllers\Admin\PageController@toggleMenu'));

    // file upload
    Route::post('/upload/{id}', array('as' => 'admin.upload.image', 'uses' => 'App\Controllers\Admin\PhotoGalleryController@upload'));
    Route::post('/delete-image', array('as' => 'admin.delete.image', 'uses' => 'App\Controllers\Admin\PhotoGalleryController@deleteImage'));

    // settings
    Route::get('/settings', function () {

        return View::make('backend.settings')->with('active', 'settings');
    });

    // form post
    Route::resource('form-post', 'App\Controllers\Admin\FormPostController', array('only' => array('index', 'show', 'destroy')));
    Route::get('form-post/{id}/delete', array('as' => 'admin.form-post.delete', 'uses' => 'App\Controllers\Admin\FormPostController@confirmDestroy'));
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

/*
App::error(function (Exception $exception) {

    Log::error($exception);
    return "error";
});
*/

App::missing(function () {

    return Response::view('errors.missing', array(), 404);
});
