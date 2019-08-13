<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\GameWeek;
use App\MatchSchedule;
use App\Subscriber;
use App\Tweet;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function asset;
use function explode;
use function str_replace;


class HomeController extends Controller
{

    //
    public function index()
    {
        $data = array();
        $data['title'] = 'Home';

        $data['sliders'] = Article::withCount('favorites')
            ->with('author', 'favorites')->orderBy('id', 'desc')->where('featured_status', 1)->where('status', 1)->limit(3)->get();
        $data['tweets'] = Tweet::orderBy('id', 'desc')->limit(3)->get();
        $data['others_sports'] = Article::withCount('favorites')->with('favorites')
            ->orderBy('id', 'desc')->whereRaw("FIND_IN_SET('9', category_id) OR FIND_IN_SET('13', category_id)")->where('status', 1)->limit(3)->get();
        $data['popular_articles'] = $this->MostPopularArticle(5);
        $data['latest_articles'] = Article::with('favorites')->withCount('favorites')->orderBy('id', 'desc')
            ->where('status', 1)
            ->whereRaw("FIND_IN_SET('9', category_id)  = 0")
            ->whereRaw("FIND_IN_SET('13', category_id)  = 0")
            ->paginate(12);
        // SEO

        $data['image'] = asset('uvl-logo.png');
        $data['description'] = "জনপ্রিয় খেলার সংবাদ, ফুটবল ম্যাচ বিশ্লেষণ, হাইলাইটস, মতামত, আর্টিক্যাল, ট্রান্সফার লাইভ ও আরো অনেক ফিচার নিয়ে ইউনিভার্সাল স্পোর্টস আপনার জন্যে উপহার হিসেবে উপস্থাপন করছে এই ওয়েবসাইট।";
        $data['keyword'] = "ইউভিউএল স্পোর্টস, ফুটবল, ক্রিকেট, ম্যাচ বিশ্লেষণ, ফুটবল ফ্যানস বাংলাদেশ, খেলার খবর সরাসরি, খেলার খবর আজ, লা লিগা আজকের খেলা, আজকের খেলার খবর, খেলার সংবাদ, খেলার খবর ফুটবল, খেলার সময়সূচী, খেলার খবর, ইংলিশ প্রিমিয়ার লিগ, লা লিগা, চ্যাম্পিয়ন্স লিগ, ট্রান্সফার রিউমার";
        $data['author'] = "https://www.facebook.com/1360157000709953";

        return view('frontend.home.home', $data);
    }

    function MostPopularArticle($limit, $cat_id = null, $user_id = null)
    {

        if (isset($cat_id)) {
            return Article::withCount('favorites')->with('favorites')
                ->orderBy('hit_count', 'desc')
                ->where('status', 1)
                ->whereRaw("FIND_IN_SET('" . $cat_id . "', category_id)")
                ->limit($limit)
                ->get();
        }

        if (isset($user_id)) {
            return Article::withCount('favorites')->with('favorites')->orderBy('hit_count', 'desc')
                ->where('user_id', $user_id)
                ->where('status', 1)
                ->limit($limit)
                ->get();
        }

        return Article::withCount('favorites')->with('favorites')->orderBy('hit_count', 'desc')
//            ->where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())
            ->where('status', 1)
            ->limit($limit)
            ->get();
    }

    function LatestArticle($limit)
    {
        return Article::withCount('favorites')->with('favorites')->orderBy('id', 'desc')
            ->where('status', 1)
            ->limit($limit)
            ->get();
    }

    public function GetArticleByCategory($slug)
    {
        $name = str_replace('-', ' ', $slug);
        $data = array();
        $info = Category::where('name', $name)->first();
        $data['articles'] = Article::withCount('favorites')->with('favorites')->orderBy('id', 'desc')
            ->where('status', 1)
            ->whereRaw("FIND_IN_SET('" . $info->id . "', category_id)")
            ->paginate(12);
        $data['category_info'] = $info;
        $data['title'] = $info->name;
        $data['popular_articles'] = $this->MostPopularArticle(10, $info->id, null);

        $data['image'] = asset('uvl-logo.png');
        $data['description'] = "জনপ্রিয় খেলার সংবাদ, ফুটবল ম্যাচ বিশ্লেষণ, হাইলাইটস, মতামত, আর্টিক্যাল, ট্রান্সফার লাইভ ও আরো অনেক ফিচার নিয়ে ইউনিভার্সাল স্পোর্টস আপনার জন্যে উপহার হিসেবে উপস্থাপন করছে এই ওয়েবসাইট।";
        $data['keyword'] = "ইউভিউএল স্পোর্টস, ফুটবল, ক্রিকেট, ম্যাচ বিশ্লেষণ, ফুটবল ফ্যানস বাংলাদেশ, খেলার খবর সরাসরি, খেলার খবর আজ, লা লিগা আজকের খেলা, আজকের খেলার খবর, খেলার সংবাদ, খেলার খবর ফুটবল, খেলার সময়সূচী, খেলার খবর, ইংলিশ প্রিমিয়ার লিগ, লা লিগা, চ্যাম্পিয়ন্স লিগ, ট্রান্সফার রিউমার";
        $data['author'] = "https://www.facebook.com/1360157000709953";


        return view('frontend.category.index', $data);
    }


    public function ArticleDetails($id, $slug)
    {
        $data = array();

        $info = Article::withCount('favorites')->with('favorites')->with('author')->where(['id' => $id, 'slug' => $slug, 'status' => 1])->first();
        Article::where('id', $id)->update(['hit_count' => $info->hit_count + 1]);

        $categories = explode(',', $info->category_id);

        $data['info'] = $info;
        $data['title'] = $info->title;
        $data['popular_articles'] = $this->MostPopularArticle(5);
        $data['latest_articles'] = $this->LatestArticle(5);
        $data['related_articles'] = Article::withCount('favorites')->with('favorites')->whereRaw("FIND_IN_SET('" . $categories[0] . "', category_id)")
            ->where('status', 1)->inRandomOrder()->limit(6)->get();

        $data['image'] = asset('image_upload/post_image/' . $info->image);
        $data['description'] = $info->meta_title;
        $data['keyword'] = $info->meta_keyword;
        $data['author'] = "https://www.facebook.com/1360157000709953";
        $data['type'] = "article";


        return view('frontend.article.index', $data);
    }

    /*
     * THIS FUNCTION FOR OLD URL
     */

    public function ArticleDetails2($id, $cat_id, $slug)
    {
        $data = array();

        $hit = Article::where(['id' => $id, 'slug' => $slug, 'status' => 1])->value('hit_count');

        Article::where('id', $id)->update(['hit_count' => $hit + 1]);

        $info = Article::withCount('favorites')->with('favorites')->with('author')->where(['id' => $id, 'slug' => $slug, 'status' => 1])->first();

        $categories = explode(',', $info->category_id);
        $category_id = $categories[0];

        $data['info'] = $info;
        $data['title'] = $info->title;
        $data['popular_articles'] = $this->MostPopularArticle(5);
        $data['latest_articles'] = $this->LatestArticle(5);
        $data['related_articles'] = Article::withCount('favorites')->with('favorites')->whereRaw("FIND_IN_SET('" . $category_id . "', category_id)")
            ->where('status', 1)->inRandomOrder()->limit(6)->get();

        $data['image'] = asset('image_upload/post_image/' . $info->image);
        $data['description'] = $info->meta_title;
        $data['keyword'] = $info->meta_keyword;
        $data['author'] = "https://www.facebook.com/1360157000709953";
        $data['type'] = "article";

        return view('frontend.article.index', $data);
    }

    public function GetAuthorList()
    {
        $data = array();
        $data['title'] = 'Author List';
        $data['latest_articles'] = $this->LatestArticle(10);
        $data['authors'] = User::with('articles')->whereHas('articles')->withCount('articles')->orderBy('articles_count', 'desc')->paginate(21);

        $data['image'] = asset('uvl-logo.png');
        $data['description'] = "জনপ্রিয় খেলার সংবাদ, ফুটবল ম্যাচ বিশ্লেষণ, হাইলাইটস, মতামত, আর্টিক্যাল, ট্রান্সফার লাইভ ও আরো অনেক ফিচার নিয়ে ইউনিভার্সাল স্পোর্টস আপনার জন্যে উপহার হিসেবে উপস্থাপন করছে এই ওয়েবসাইট।";
        $data['keyword'] = "ইউভিউএল স্পোর্টস, ফুটবল, ক্রিকেট, ম্যাচ বিশ্লেষণ, ফুটবল ফ্যানস বাংলাদেশ, খেলার খবর সরাসরি, খেলার খবর আজ, লা লিগা আজকের খেলা, আজকের খেলার খবর, খেলার সংবাদ, খেলার খবর ফুটবল, খেলার সময়সূচী, খেলার খবর, ইংলিশ প্রিমিয়ার লিগ, লা লিগা, চ্যাম্পিয়ন্স লিগ, ট্রান্সফার রিউমার";
        $data['author'] = "https://www.facebook.com/1360157000709953";


        return view('frontend.author.index', $data);
    }

    public function UserProfile($id, $name)
    {
        $name = str_replace('-', ' ', $name);
        $data = array();
        $data['title'] = $name;
        $data['author_info'] = User::where('id', $id)->first();
        $data['articles'] = Article::withCount('favorites')->with('favorites')->orderBy('id', 'desc')->where('user_id', $id)->paginate(12);
        $data['total_hit'] = Article::where('user_id', $id)->sum('hit_count');
        $data['popular_articles'] = $this->MostPopularArticle(10, null, $id);


        $data['image'] = asset($data['author_info']->image);
        $data['description'] = "জনপ্রিয় খেলার সংবাদ, ফুটবল ম্যাচ বিশ্লেষণ, হাইলাইটস, মতামত, আর্টিক্যাল, ট্রান্সফার লাইভ ও আরো অনেক ফিচার নিয়ে ইউনিভার্সাল স্পোর্টস আপনার জন্যে উপহার হিসেবে উপস্থাপন করছে এই ওয়েবসাইট।";
        $data['keyword'] = "ইউভিউএল স্পোর্টস, ফুটবল, ক্রিকেট, ম্যাচ বিশ্লেষণ, ফুটবল ফ্যানস বাংলাদেশ, খেলার খবর সরাসরি, খেলার খবর আজ, লা লিগা আজকের খেলা, আজকের খেলার খবর, খেলার সংবাদ, খেলার খবর ফুটবল, খেলার সময়সূচী, খেলার খবর, ইংলিশ প্রিমিয়ার লিগ, লা লিগা, চ্যাম্পিয়ন্স লিগ, ট্রান্সফার রিউমার";
        $data['author'] = $data['author_info']->user_fb;


        return view('frontend.profile.index', $data);
    }


    public function ContactUs()
    {
        $data = array();
        $data['title'] = 'Contact Us';
        $data['latest_articles'] = $this->LatestArticle(5);

        $data['image'] = asset('uvl-logo.png');
        $data['description'] = "জনপ্রিয় খেলার সংবাদ, ফুটবল ম্যাচ বিশ্লেষণ, হাইলাইটস, মতামত, আর্টিক্যাল, ট্রান্সফার লাইভ ও আরো অনেক ফিচার নিয়ে ইউনিভার্সাল স্পোর্টস আপনার জন্যে উপহার হিসেবে উপস্থাপন করছে এই ওয়েবসাইট।";
        $data['keyword'] = "ইউভিউএল স্পোর্টস, ফুটবল, ক্রিকেট, ম্যাচ বিশ্লেষণ, ফুটবল ফ্যানস বাংলাদেশ, খেলার খবর সরাসরি, খেলার খবর আজ, লা লিগা আজকের খেলা, আজকের খেলার খবর, খেলার সংবাদ, খেলার খবর ফুটবল, খেলার সময়সূচী, খেলার খবর, ইংলিশ প্রিমিয়ার লিগ, লা লিগা, চ্যাম্পিয়ন্স লিগ, ট্রান্সফার রিউমার";
        $data['author'] = "https://www.facebook.com/1360157000709953";


        return view('frontend.contact.index', $data);
    }

    public function AboutUs()
    {
        $data = array();
        $data['title'] = 'Contact Us';

        $data['image'] = asset('uvl-logo.png');
        $data['description'] = "জনপ্রিয় খেলার সংবাদ, ফুটবল ম্যাচ বিশ্লেষণ, হাইলাইটস, মতামত, আর্টিক্যাল, ট্রান্সফার লাইভ ও আরো অনেক ফিচার নিয়ে ইউনিভার্সাল স্পোর্টস আপনার জন্যে উপহার হিসেবে উপস্থাপন করছে এই ওয়েবসাইট।";
        $data['keyword'] = "ইউভিউএল স্পোর্টস, ফুটবল, ক্রিকেট, ম্যাচ বিশ্লেষণ, ফুটবল ফ্যানস বাংলাদেশ, খেলার খবর সরাসরি, খেলার খবর আজ, লা লিগা আজকের খেলা, আজকের খেলার খবর, খেলার সংবাদ, খেলার খবর ফুটবল, খেলার সময়সূচী, খেলার খবর, ইংলিশ প্রিমিয়ার লিগ, লা লিগা, চ্যাম্পিয়ন্স লিগ, ট্রান্সফার রিউমার";
        $data['author'] = "https://www.facebook.com/1360157000709953";


        return view('frontend.about.index', $data);
    }

    public function TvSchedule()
    {
        $data = array();
        $data['title'] = 'TV Schedule';

        $last_game_week = GameWeek::orderBy('id', 'desc')->first();
        $data['game_week_name'] = $last_game_week->name;
        $data['match_schedules'] = MatchSchedule::with('game_week', 'tournament')->where('game_week_id', $last_game_week->id)->get();

        $data['image'] = asset('uvl-logo.png');
        $data['description'] = "জনপ্রিয় খেলার সংবাদ, ফুটবল ম্যাচ বিশ্লেষণ, হাইলাইটস, মতামত, আর্টিক্যাল, ট্রান্সফার লাইভ ও আরো অনেক ফিচার নিয়ে ইউনিভার্সাল স্পোর্টস আপনার জন্যে উপহার হিসেবে উপস্থাপন করছে এই ওয়েবসাইট।";
        $data['keyword'] = "ইউভিউএল স্পোর্টস, ফুটবল, ক্রিকেট, ম্যাচ বিশ্লেষণ, ফুটবল ফ্যানস বাংলাদেশ, খেলার খবর সরাসরি, খেলার খবর আজ, লা লিগা আজকের খেলা, আজকের খেলার খবর, খেলার সংবাদ, খেলার খবর ফুটবল, খেলার সময়সূচী, খেলার খবর, ইংলিশ প্রিমিয়ার লিগ, লা লিগা, চ্যাম্পিয়ন্স লিগ, ট্রান্সফার রিউমার";
        $data['author'] = "https://www.facebook.com/1360157000709953";


        return view('frontend.tv_schedule.index', $data);
    }

    public function SearchMatch(Request $request)
    {
        $str = $request->string;

        $result = MatchSchedule::with('game_week', 'tournament')->where('title', "LIKE", "%" . $str . "%")
            ->orWhere('channel_name', "LIKE", "%" . $str . "%")
            ->get();

        return response()->json($result);
    }


    public function CreateSubscriber(Request $request)
    {
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return back()->with('message', 'Thanks for subscription.');
    }

}
