<?php

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
Route::post('auth/login', 'APIAuthController@login');
Route::group(['middleware' => 'jwt.refresh'], function () {
    Route::get('auth/refresh', 'APIAuthController@refresh');
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('auth/user', 'APIAuthController@user');
    Route::post('auth/logout', 'APIAuthController@logout');

    Route::patch('auth/profile-update/{id}', 'Api\UserController@updateProfile');

    Route::post('/account/save-tweet', 'TweetController@save')->name('save.tweet');
    Route::patch('/account/update-tweet/{id}', 'TweetController@update')->name('update.tweet');
    Route::delete('/account/delete-tweet/{id}', 'TweetController@delete')->name('delete.tweet');

    Route::post('/account/save-article', 'Api\UserController@saveArticle')->name('save.article');
    Route::post('account/get-article-details', 'Api\UserController@getArticleDetails');
    Route::patch('/account/update-article/{id}', 'Api\UserController@saveArticle')->name('update.article');
    Route::delete('/account/delete-article/{id}', 'Api\UserController@deleteArticle')->name('delete.article');
    Route::get('account/get-my-articles', 'Api\UserController@myArticles');
});

Route::get('/get-categories', ['as'=> 'api.get_categories', 'uses' => 'Api\CmsController@getCategories']);
Route::get('/get-articles', ['as'=> 'api.get_articles', 'uses' => 'Api\CmsController@getLatestArticles']);
Route::get('/get-article-details/{id}', ['as'=> 'api.get_article_details', 'uses' => 'Api\CmsController@getArticleDetails']);
Route::get('/get-more-tweets', ['as'=> 'api.load_more_tweets', 'uses' => 'Api\CmsController@getLatestStories']);
Route::get('/get-about-us', ['as'=> 'api.get_about_us', 'uses' => 'Api\CmsController@getAboutUsData']);
Route::get('/get-our-team', ['as'=> 'api.get_our_team', 'uses' => 'Api\CmsController@getOurTeamData']);
Route::get('/get-tv-schedule', ['as'=> 'api.get_tv_schedule', 'uses' => 'Api\CmsController@getTvScheduleData']);

Route::post('/send-email-from-app', ['as'=> 'api.send-email-from-app', 'uses' => 'Api\CmsController@sendEmailFromApp']);