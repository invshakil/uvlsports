<?php

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

/*
 * WEBSITE ROUTES
 */

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/search', ['as' => 'search', 'uses' => 'HomeController@SearchResult']);
Route::get('category/{slug}', ['as' => 'article.by.category', 'uses' => 'HomeController@GetArticleByCategory']);
Route::get('/news-details/{id}/{cat_id}/{slug}', ['as' => 'article.details', 'uses' => 'HomeController@ArticleDetails2']);
Route::get('/article/{id}/{slug}', ['as' => 'article.details', 'uses' => 'HomeController@ArticleDetails']);
Route::get('/লেখকদের-তালিকা', ['as' => 'author.list', 'uses' => 'HomeController@GetAuthorList']);
//Route::get('/user-profile/index/{id}', ['as' => 'old.user.profile', 'uses' => 'HomeController@UserProfile']);
Route::get('/author/{id}/{name}', ['as' => 'user.profile', 'uses' => 'HomeController@UserProfile']);
Route::get('/যোগাযোগ', ['as' => 'contact.us', 'uses' => 'HomeController@ContactUs']);
Route::post('/contact-us', ['as' => 'submit.contact.form', 'uses' => 'HomeController@SubmitContactForm']);
Route::get('/আমাদের-সম্পর্কে', ['as' => 'about.us', 'uses' => 'HomeController@AboutUs']);
Route::get('/খেলার-সময়সূচী', ['as' => 'tv.schedule', 'uses' => 'HomeController@TvSchedule']);
Route::get('/match-schedule/search', ['as' => 'match.schedule', 'uses' => 'HomeController@SearchMatch']);
Route::post('/create-subscribe', ['as' => 'create.subscriber', 'uses' => 'HomeController@CreateSubscriber']);
Route::post('/save-favorite-article', ['as' => 'save.favorite', 'uses' => 'UserController@SaveFavorite']);
Route::get('/খেলার-সর্বশেষ-সংবাদ', ['as' => 'get.latest.stories', 'uses' => 'HomeController@getLatestStories']);

Route::get('sitemap', function () {

    // create new sitemap object
    $sitemap = App::make('sitemap');

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    $sitemap->setCache('uvlsports.sitemap', 60);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached()) {
        // add item to the sitemap (url, date, priority, freq)
        $sitemap->add(URL::to('/'), time(), '1.0', 'daily');
        $sitemap->add(URL::to('/about-us'), time(), '0.9', 'monthly');
        $sitemap->add(URL::to('/contact-us'), time(), '0.9', 'monthly');
        $sitemap->add(URL::to('/tv-schedule'), time(), '0.9', 'monthly');
        $sitemap->add(URL::to('/authors-list'), time(), '0.9', 'monthly');
        // get all posts from db
        $posts = \App\Article::with('author:id,name')->orderBy('created_at', 'desc')->where('status', 1)->get();
        // get all categories
        $cats = \App\Category::select('id', 'name')->where('status', 1)->get();

        // add every cats to the sitemap
        foreach ($cats as $cat) {
            $sitemap->add('/category/' . str_replace(' ', '-', $cat->name), time(), '0.8', 'daily');
        }

        // add every post to the sitemap
        foreach ($posts as $key => $post) {
            $sitemap->add('/article/' . $post->id . '/' . $post->slug, $post->updated_at, '0.7', 'monthly');
        }

    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
/*
 * AUTHENTICATION ROUTES
 */


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/account', 'UserController@index')->name('account')->middleware('auth');
Route::post('/account', 'UserController@UpdateUserSettings')->name('save.user.settings')->middleware('auth');

Route::get('/account/create-article', 'UserController@CreateArticle')->name('create.article')->middleware('auth');
Route::post('/account/create-article', 'UserController@SaveArticle')->name('save.article')->middleware('auth');
Route::get('/account/edit-article/{id}', 'UserController@EditArticle')->name('account.article.edit')->middleware('auth');
Route::post('/account/edit-article/{id}', 'UserController@UpdateArticle')->name('account.article.update')->middleware('auth');

Route::get('/account/my-articles', 'UserController@MyArticles')->name('my.articles')->middleware('auth');
Route::get('/account/pending-articles', 'UserController@PendingArticles')->name('pending.articles')->middleware('auth');
Route::get('/account/favorite-articles', 'UserController@FavoriteArticles')->name('favorite.articles')->middleware('auth');
Route::get('/account/saved-articles', 'UserController@SavedArticle')->name('saved.articles')->middleware('auth');

Route::get('/get-more-tweets', ['as' => 'load_more_tweets', 'uses' => 'HomeController@getLatestStories']);
Route::post('/account/save-tweet', 'TweetController@save')->name('save.tweet')->middleware('auth');
Route::patch('/account/update-tweet/{id}', 'TweetController@update')->name('update.tweet')->middleware('auth');
Route::delete('/account/delete-tweet/{id}', 'TweetController@delete')->name('delete.tweet')->middleware('auth');

/*
 * SOCIAL LOGIN WITH FACEBOOK / TWITTER / GMAIL
 */


$s = 'social.';
Route::get('/login/{provider}/redirect', ['as' => $s . 'redirect', 'uses' => 'SocialLoginController@getSocialRedirect']);
Route::get('/login/{provider}/callback', ['as' => $s . 'handle', 'uses' => 'SocialLoginController@getSocialHandle']);

/*
 *
 * DEFINING
 * ADMIN ROUTES
 *
 */
Route::redirect('/admin', '/admin/dashboard', 301);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin/', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminController@index']);

    Route::get('/add-user', ['as' => 'user.add', 'uses' => 'AdminController@add_user']);
    Route::post('/save-user', ['as' => 'save.user', 'uses' => 'AdminController@saveUser']);
    Route::get('/delete-user/{id}', ['as' => 'delete.user', 'uses' => 'AdminController@deleteUser']);
    Route::get('/promote-user/{id}', ['as' => 'promote.user', 'uses' => 'AdminController@promoteUser']);
    Route::get('/demote-user/{id}', ['as' => 'demote.user', 'uses' => 'AdminController@demoteUser']);
    Route::get('/tweet-access-permission/{id}', ['as' => 'tweet.access', 'uses' => 'AdminController@tweetAccessForUser']);

    Route::get('/user-list', ['as' => 'user.manage', 'uses' => 'AdminController@manage_user']);
    Route::get('/user-role', ['as' => 'user.role', 'uses' => 'AdminController@user_role']);

    Route::get('/system-settings', ['as' => 'system.settings', 'uses' => 'AdminController@system_settings']);
    Route::post('/system-settings', ['as' => 'save.system.settings', 'uses' => 'AdminController@save_system_settings']);
    Route::post('/save-logo', ['as' => 'save.logo', 'uses' => 'AdminController@save_system_logo']);
    Route::post('/save-mail-config', ['as' => 'save.mail.config', 'uses' => 'AdminController@save_system_mail_config']);

    Route::get('/account-settings', ['as' => 'account.settings', 'uses' => 'AdminController@account_settings']);

    /*
     * CATEGORIES
     */
    Route::get('/categories', ['as' => 'categories', 'uses' => 'PostController@Categories']);
    Route::post('/categories', ['as' => 'create.category', 'uses' => 'PostController@SaveCategory']);
    Route::post('/update-category', ['as' => 'update.category', 'uses' => 'PostController@UpdateCategory']);
    Route::get('/delete-category/{id}', ['as' => 'delete.category', 'uses' => 'PostController@DeleteCategory']);

    /*
     * ARTICLES
     */

    Route::get('/create-article', ['as' => 'admin.create.article', 'uses' => 'PostController@CreateArticle']);
    Route::post('/create-article', ['as' => 'admin.save.article', 'uses' => 'PostController@SaveArticle']);

    Route::get('/articles-list', ['as' => 'admin.article.list', 'uses' => 'PostController@manageArticles']);
    Route::get('/get-articles-list', ['as' => 'admin.get.articles', 'uses' => 'PostController@getArticles']);
    Route::get('/pending-articles-list', ['as' => 'admin.pending.article.list', 'uses' => 'PostController@managePendingArticles']);
    Route::get('/delete-article/{id}', ['as' => 'delete.article', 'uses' => 'PostController@deleteArticle']);
    Route::post('/delete-article/', ['as' => 'delete.article', 'uses' => 'PostController@deleteBatchArticle']);
    Route::get('/edit-article/{id}', ['as' => 'edit.article', 'uses' => 'PostController@EditArticle']);
    Route::post('/edit-article/{id}', ['as' => 'update.article', 'uses' => 'PostController@UpdateArticle']);

    /*
     * TV SCHEDULE
     */

    Route::get('/create-game-week', ['as' => 'create.game.week', 'uses' => 'TvScheduleController@CreateGameWeek']);
    Route::post('/create-game-week', ['as' => 'save.game.week', 'uses' => 'TvScheduleController@SaveGameWeek']);
    Route::post('/update-game-week', ['as' => 'update.game.week', 'uses' => 'TvScheduleController@UpdateGameWeek']);
    Route::get('/delete-game-week/{id}', ['as' => 'delete.game.week', 'uses' => 'TvScheduleController@DeleteGameWeek']);


    Route::get('/create-matches-info', ['as' => 'create.matches.info', 'uses' => 'TvScheduleController@CreateMatchesInfo']);
    Route::post('/create-matches-info', ['as' => 'save.matches.info', 'uses' => 'TvScheduleController@SaveMatchesInfo']);
    Route::post('/update-matches-info', ['as' => 'update.matches.info', 'uses' => 'TvScheduleController@UpdateMatchesInfo']);
    Route::get('/delete-matches-info/{id}', ['as' => 'delete.matches.info', 'uses' => 'TvScheduleController@DeleteMatchesInfo']);

    Route::get('/create-tournament', ['as' => 'create.tournament', 'uses' => 'TvScheduleController@CreateTournament']);
    Route::post('/create-tournament', ['as' => 'save.tournament', 'uses' => 'TvScheduleController@SaveTournament']);
    Route::post('/update-tournament', ['as' => 'update.tournament', 'uses' => 'TvScheduleController@UpdateTournament']);
    Route::get('/delete-tournament/{id}', ['as' => 'delete.tournament', 'uses' => 'TvScheduleController@DeleteTournament']);

    /*
     * SUBSCRIBER LIST
     */

    Route::get('/manage-subscribers', ['as' => 'get.subscribers', 'uses' => 'SubscriberController@index']);
    Route::get('/delete-subscriber/{id}', ['as' => 'delete.subscriber', 'uses' => 'SubscriberController@delete']);

    /*
     * CMS WIDGETS
     */
    Route::get('/manage-footer-content', ['as' => 'set.footer.content', 'uses' => 'CmsWidgetController@footer']);
    Route::post('/save-footer-content', ['as' => 'save.footer.content', 'uses' => 'CmsWidgetController@saveFooterContent']);
    Route::post('/save-footer-links', ['as' => 'save.footer.links', 'uses' => 'CmsWidgetController@saveFooterLinks']);

    Route::get('/manage-about-us-page', ['as' => 'manage.about_us.page', 'uses' => 'CmsWidgetController@aboutUs']);
    Route::post('/manage-about-us-page', ['as' => 'manage.about_us.page', 'uses' => 'CmsWidgetController@saveAboutUs']);

    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        $notification = array(
            'message' => 'Cache Cleared!', 'alert-type' => 'success'
        );
        return back()->with($notification);
    })->name('clear.cache');
});


/*
 *
 * DEFINING
 * MODERATOR ROUTES
 *
 */

Route::group(['prefix' => 'user/', 'middleware' => ['auth']], function () {

    Route::get('/dashboard', function () {
        echo 'welcome to dashboard!<a href="' . route('logout') . '">Logout</a>';
    });

});
