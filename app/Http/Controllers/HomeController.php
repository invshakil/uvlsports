<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Favorite;
use App\GameWeek;
use App\Mail\ContactUs;
use App\MatchSchedule;
use App\Subscriber;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use function asset;
use function explode;
use function str_replace;


class HomeController extends Controller
{
    public function index()
    {
        $data = array();
        $data['title'] = 'Home';

        $data['sliders'] = Cache::remember('home.sliders', 3600, function () {
            return Article::withCount('favorites')
                ->with('author', 'favorites')->orderBy('id', 'desc')->where('featured_status', 1)->where('status', 1)->limit(3)->get();
        });
        $data['tweets'] = Cache::remember('home.tweets', 3600, function () {
            return Tweet::orderBy('id', 'desc')->limit(5)->get();
        });
        $data['others_sports'] = Cache::remember('home.other_sports', 3600, function () {
            return Article::with('favorites')->withCount('favorites')
                ->orderBy('id', 'desc')->whereRaw("FIND_IN_SET('9', category_id) OR FIND_IN_SET('13', category_id)")
                ->where('status', 1)->limit(3)->get();
        });
        $data['popular_articles'] = Cache::remember('home.popular_articles', 3600, function () {
            return $this->MostPopularArticle(10);
        });
        $data['latest_articles'] = Cache::remember('home.latest_articles', 3600, function () {
            return Article::with('favorites')->withCount('favorites')->orderBy('id', 'desc')
                ->where('status', 1)
                ->whereRaw("FIND_IN_SET('9', category_id)  = 0")
                ->whereRaw("FIND_IN_SET('13', category_id)  = 0")
                ->paginate(12);
        });
        $data = defaultSeo($data);

        return view('frontend.home.home', $data);
    }

    function MostPopularArticle($limit, $cat_id = null, $user_id = null)
    {

        if (isset($cat_id)) {
            return Article::with('favorites')->withCount('favorites')
                ->orderBy('hit_count', 'desc')
                ->where('status', 1)
                ->whereRaw("FIND_IN_SET('" . $cat_id . "', category_id)")
                ->limit($limit)
                ->get();
        }

        if (isset($user_id)) {
            return Article::with('favorites')->withCount('favorites')->orderBy('hit_count', 'desc')
                ->where('user_id', $user_id)
                ->where('status', 1)
                ->limit($limit)
                ->get();
        }

        return Article::with('favorites')->withCount('favorites')->orderBy('hit_count', 'desc')
//            ->where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())
            ->where('status', 1)
            ->limit($limit)
            ->get();
    }

    function LatestArticle($limit)
    {
        return Article::with('favorites')->withCount('favorites')->orderBy('id', 'desc')
            ->where('status', 1)
            ->limit($limit)
            ->get();
    }

    public function GetArticleByCategory($slug)
    {
        $name = str_replace('-', ' ', $slug);
        $data = array();
        $info = Category::where('name', $name)->first();
        $data['articles'] = Article::with('favorites')
            ->withCount('favorites')
            ->orderBy('id', 'desc')
            ->where('status', '=', 1)
            ->whereRaw("FIND_IN_SET('" . $info->id . "', category_id)")
            ->paginate(12);
        $data['category_info'] = $info;
        $data['title'] = $info->name;
        $data['popular_articles'] = $this->MostPopularArticle(15, $info->id, null);
        $data = defaultSeo($data);

        return view('frontend.category.index', $data);
    }

    public function SearchResult(Request $request)
    {
        $string = $request->keyword;
        $data = array();
        $data['articles'] = Article::with('favorites')
            ->withCount('favorites')
            ->orderBy('id', 'desc')
            ->where('status', '=', 1)
            ->where('title', 'like', '%' . $string . '%')
            ->orWhere('meta_keyword', 'like', '%' . $string . '%')
            ->paginate(12);

        $data['title'] = "Search Result for $string";
        $data['popular_articles'] = $this->MostPopularArticle(10);
        $data = defaultSeo($data);

        return view('frontend.search.index', $data);
    }


    public function ArticleDetails($id, $slug)
    {
        $data = array();

        $info = Article::with('favorites')->withCount('favorites')->with('author')->where(['id' => $id, 'slug' => $slug, 'status' => 1])->first();
        if (!$info) {
            abort(404, 'Not Found');
        }
        Article::where('id', $id)->update(['hit_count' => $info->hit_count + 1]);

        $categories = explode(',', $info->category_id);

        $data['info'] = $info;
        $data['title'] = $info->title;
        $data['popular_articles'] = $this->MostPopularArticle(5);
        $data['latest_articles'] = $this->LatestArticle(5);
        $data['related_articles'] = Article::with('favorites')->withCount('favorites')->whereRaw("FIND_IN_SET('" . $categories[0] . "', category_id)")
            ->where('status', 1)->inRandomOrder()->limit(6)->get();

        $data['image'] = asset('image_upload/post_image/' . $info->image);
        $data['description'] = $info->meta_keyword;
        $data['keyword'] = $info->tags;
        $data['type'] = "article";
        $data = defaultSeo($data);

        return view('frontend.article.index', $data);
    }

    /*
     * THIS FUNCTION FOR OLD URL
     */

    public function ArticleDetails2($id, $cat_id, $slug)
    {
        return redirect('/article/'.$id.'/'.$slug);
//        $data = array();
//
//        $hit = Article::where(['id' => $id, 'slug' => $slug, 'status' => 1])->value('hit_count');
//
//        Article::where('id', $id)->update(['hit_count' => $hit + 1]);
//
//        $info = Article::with('favorites')->withCount('favorites')->with('author')->where(['id' => $id, 'slug' => $slug, 'status' => 1])->first();
//
//        $categories = explode(',', $info->category_id);
//        $category_id = $categories[0];
//
//        $data['info'] = $info;
//        $data['title'] = $info->title;
//        $data['popular_articles'] = $this->MostPopularArticle(5);
//        $data['latest_articles'] = $this->LatestArticle(5);
//        $data['related_articles'] = Article::with('favorites')->withCount('favorites')->whereRaw("FIND_IN_SET('" . $category_id . "', category_id)")
//            ->where('status', 1)->inRandomOrder()->limit(6)->get();
//
//        $data['image'] = asset('image_upload/post_image/' . $info->image);
//        $data['description'] = $info->meta_keyword;
//        $data['keyword'] = $info->tags;
//        $data['type'] = "article";
//        $data = defaultSeo($data);
//
//        return view('frontend.article.index', $data);
    }

    public function GetAuthorList()
    {
        $data = array();
        $data['title'] = 'Author List';
        $data['latest_articles'] = $this->LatestArticle(10);
        $data['authors'] = User::with('articles')->whereHas('articles')->withCount('articles')->orderBy('articles_count', 'desc')->paginate(21);

        $data = defaultSeo($data);
        return view('frontend.author.index', $data);
    }

    public function UserProfile($id, $name)
    {
        $name = str_replace('-', ' ', $name);
        $data = array();
        $data['title'] = $name;
        $data['author_info'] = User::where('id', $id)->first();
        $data['articles'] = Article::with('favorites')->withCount('favorites')->orderBy('id', 'desc')->where('user_id', $id)->paginate(12);
        $data['total_hit'] = Article::where('user_id', $id)->sum('hit_count');
        $articleIds = Article::select('id')->where('user_id', $id)->get()->toArray();
        $data['total_favorites'] = Favorite::whereIn('article_id', $articleIds)->get()->count();
        $data['popular_articles'] = $this->MostPopularArticle(10, null, $id);

        $data['image'] = asset($data['author_info']->image);
        $data['author'] = $data['author_info']->user_fb;
        $data = defaultSeo($data);

        return view('frontend.profile.index', $data);
    }


    public function ContactUs()
    {
        $data = array();
        $data['title'] = 'Contact Us';
        $data['latest_articles'] = $this->LatestArticle(5);
        $data = defaultSeo($data);
        return view('frontend.contact.index', $data);
    }

    public function AboutUs()
    {
        $data = array();
        $data['title'] = 'Contact Us';
        $data = defaultSeo($data);
        $data['admins'] = User::whereIn('role', [1,2])->get();

        return view('frontend.about.index', $data);
    }

    public function TvSchedule()
    {
        $data = array();
        $data['title'] = 'TV Schedule';

        $last_game_week = GameWeek::orderBy('id', 'desc')->first();
        $data['game_week_name'] = $last_game_week->name;
        $data['match_schedules'] = MatchSchedule::with('game_week', 'tournament')->where('game_week_id', $last_game_week->id)->orderBy('time', 'asc')->get();
        $data = defaultSeo($data);

        return view('frontend.tv_schedule.index', $data);
    }

    public function SearchMatch(Request $request)
    {
        $str = $request->string;
        $last_game_week = GameWeek::orderBy('id', 'desc')->first();
        $result = MatchSchedule::with('game_week', 'tournament')
            ->where('game_week_id', $last_game_week->id)
            ->where('title', "LIKE", "%" . $str . "%")
            ->orWhere('channel_name', "LIKE", "%" . $str . "%")
            ->orWhereHas('tournament', function ($q) use ($str) {
                return $q->where('name', "LIKE", "%" . $str . "%");
            })
            ->orderBy('time', 'asc')
            ->get();

        return response()->json($result);
    }


    public function CreateSubscriber(Request $request)
    {
        $request->validate(['subscription_email' => 'required|email']);
        $subscriber = new Subscriber();
        $subscriber->email = $request->subscription_email;
        $subscriber->save();

        return back()->with('message', 'Thanks for subscription.');
    }

    public function SubmitContactForm(Request $request)
    {
        $request->validate([
            'your_name' => 'required|min:6',
            'your_email' => 'required|email',
            'subject' => 'required',
            'your_comment' => 'required|min:20',
        ]);
        $data = array(
            'name' => $request->get('your_name'),
            'subject' => $request->get('subject'),
            'email' => $request->get('your_email'),
            'user_message' => $request->get('your_comment')
        );
        Mail::to(['uvlsports@gmail.com', 'inverse.shakil@gmail.com', 'rahiksumail@gmail.com'], 'UVL Sports')->send(new ContactUs($data));
        return back()->with('success', 'We have received your email. We will get back at you as soon as possible. thanks for being in touch with us!');
    }


    public function getLatestStories(Request $request)
    {

        $data = array();
        $query = Tweet::orderBy('id', 'desc');
        if ($request->has('page')) {
            $set = $request->set;
            $page = $request->page * $set;
            $results = $query->skip($page)->take($set)->get();
            return response()->json($results);
        } else {
            $set = 10;
            $page = 0;
            $results = $query->skip($page)->take($set)->get();
        }
        $data['title'] = 'খেলার সর্বশেষ সংবাদ';
        $data['latest_articles'] = $this->LatestArticle(10);
        $data = defaultSeo($data);
        $data['tweets'] = $results;
        $data['isAllowed'] = (new Tweet())->isAllowed();
        return view('frontend.latest_short_stories.index', $data);
    }
}
