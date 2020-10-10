<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'nav'], function () {
    Route::get('gallery', function () {
        return view('music_test.public.gallery');
    })->name('gallery');
});

Route::get('profile/{id}', 'App\Http\Controllers\UserController@show')->name('profile');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'GroupsController@index')->name('main');
    Route::get('group/{id}', 'GroupsController@showGroup')->name('group');
    Route::get('album/{id}', 'GroupsController@showAlbum')->name('album');
    Route::get('singer/{id}', 'GroupsController@showSinger')->name('singer');
});

Route::group(['namespace' => 'App\Http\Controllers\Cms', 'prefix' => 'cms', 'middleware' => 'auth'], function () {
    Route::resource('groups', 'Groups\GroupsController')->names('cms.music.groups');
    Route::resource('albums', 'Albums\AlbumsController')->names('cms.music.albums');
    Route::resource('singers', 'Singers\SingersController')->names('cms.music.singers');
    Route::resource('songs', 'Songs\SongsController')->names('cms.music.songs');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/cms/ajax/group', 'AjaxController@getGroup');
    Route::get('/cms/ajax/album/{id}', 'AjaxController@ajaxAlbum');
    Route::get('/cms/ajax/album', 'AjaxController@getAlbum');
    Route::get('/cms/ajax/song/{id}', 'AjaxController@ajaxSong');
    Route::get('/cms/ajax/singer/{id}', 'AjaxController@ajaxSinger');
    Route::get('/cms/ajax/singer', 'AjaxController@getSinger');
});

Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
