<?php

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

Route::get('/','HomeController@index');
Route::get('/products','ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('artikel')->group(function () {
    Route::middleware('auth')->group(function (){
        Route::middleware('artikel.user')->group(function (){
            Route::get('update/{id}','ArtikelController@showUpdateForm')->name('showUpdateArtikelForm');
            Route::patch('update/{id}','ArtikelController@update')->name('updateArtikel');
            Route::delete('delete/{id}','ArtikelController@delete')->name('deleteArtikel');
        });
        Route::get("create","ArtikelController@showForm")->name('showArtikelForm');
        Route::post("create","ArtikelController@store")->name("storeArtikel");

        Route::post('comment/{id}','CommentController@store')->name('postComment');

        Route::get('my','ArtikelController@showMy')->name('showMyArtikel');
    });

    Route::get('/','ArtikelController@index')->name('showArtikels');
    Route::get('{id}','ArtikelController@show')->name('showOneArtikel');
});

