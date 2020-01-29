<?php

namespace App\Http\Controllers\Api;

use App\GameWeek;
use App\MatchSchedule;
use App\User;
use App\Widget;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Tweet;
use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class CmsController extends Controller
{
    public function getCategories()
    {
        $categories = Cache::remember('categories', 3600, function () {
            return Category::where('status', 1)->select('id', 'bangla_name', 'name', 'is_league')->get();
        });

        return response()->json($categories);
    }

    /*
     * @param Request
     * returns Articles in JSON format
     */

    public function getLatestArticles(Request $request)
    {
        $query = Article::select('id', 'title', 'user_id', 'created_at', 'image', 'category_id')
            ->with('author:id,name')->orderBy('id', 'desc')->where('status', 1);


        if ($request->has('string') && $request->input('string') != '') {
            $string = '%' . $request->input('string') . '%';
            $query = $query->where('title', 'like', $string);
        }

        if ($request->has('category_id') && $request->input('category_id') > 0) {
            $query = $query->whereRaw("FIND_IN_SET('" . $request->input('category_id') . "', category_id)");
        }

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
        return response()->json($results);
    }

    /*
     * @param Article $id
     * Returns Article Details in JSON format
     */

    public function getArticleDetails(Request $request, $id)
    {
        $result = Article::with('author:id,name')->where('id', $id)->first();
        $result->categories = $result->category($result->category_id);
        return response()->json($result);
    }

    /*
     * @param Request
     * Returns Short Tweets in JSON Format
     */

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

    /*
     * ABOUT US PAGE DATA
     */

    public function getAboutUsData()
    {
        return response()->json(['data' => Widget::getWidget('about_us')]);
    }

    /*
     * OUR TEAM DATA
     */

    public function getOurTeamData()
    {
        return response()->json(['data' => User::whereIn('role', [1, 2])->get()]);
    }

    /*
     * TV SCHEDULE DATA
     */

    public function getTvScheduleData()
    {
        $lastGameWeek = GameWeek::orderBy('id', 'desc')->first();
        $data['gameWeekName'] = $lastGameWeek->name;
        $data['tvSchedule'] = MatchSchedule::with('game_week', 'tournament')->where('game_week_id', $lastGameWeek->id)->orderBy('time', 'asc')->get();

        return response()->json(['data' => $data]);
    }

    /*
     * Send Email
     */

    public function sendEmailFromApp(Request $request)
    {
       try{
            $request->validate([
                'name' => 'required|min:6',
                'email' => 'required|email',
                'subject' => 'required',
                'description' => 'required|min:20',
            ]);
            $data = array(
                'name' => $request->get('name'),
                'subject' => $request->get('subject'),
                'email' => $request->get('email'),
                'user_message' => $request->get('description')
            );

            Mail::to(['uvlsports@gmail.com', 'inverse.shakil@gmail.com', 'rahiksumail@gmail.com'], 'UVL Sports')->send(new ContactUs($data));
            return response()->json(true);
       }
       catch(\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
       }
    }
}
