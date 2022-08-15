<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// problem: api.post.index can't be accessed despite already being logged in
// solution: vvv
//https://stackoverflow.com/questions/52166907/laravel-using-web-authentication-in-all-api-routes-redirect-to-home

Route::group(['middleware' => 'auth:web'], function () {
    Route::prefix('comics')->group(function () { // url/{`arg`?}<- ? means optional
        Route::get('/', 'Api\ComicController@index')->name('api.comics.index');
        // Route::post('{id}/update-chapter', 'Api\ComicController@update_chapter')->name('api.comics.update_chapter');
        Route::post('{id}/update-chapter-plus', 'Api\ComicController@increment_chapter')->name('api.comics.plus_chapter');
        Route::post('{id}/update-chapter-minus', 'Api\ComicController@decrement_chapter')->name('api.comics.minus_chapter');
    });

    Route::prefix('websites')->group(function () {
        Route::get('/', 'Api\WebsiteController@index')->name('api.sites.index');
    });
});
