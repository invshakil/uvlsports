<?php

use Illuminate\Http\Request;

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

Route::get('/get-more-tweets', ['as'=> 'api.load_more_tweets', 'uses' => 'HomeController@getLatestStories']);
//Route::get('/get-more-tweets', ['as' => 'api.load_more_tweets', 'uses' => 'HomeController@getLatestStories'])->middleware('auth.api');

Route::post('/account/save-tweet', 'TweetController@save')->name('save.tweet');
Route::patch('/account/update-tweet/{id}', 'TweetController@update')->name('update.tweet');
Route::delete('/account/delete-tweet/{id}', 'TweetController@delete')->name('delete.tweet');