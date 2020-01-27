<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Events\NewArticleSubmitted;
use App\Favorite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use function asset;
use function auth;
use function back;
use function count;
use function implode;
use function redirect;
use function response;


class UserController extends Controller
{
    public function index()
    {
        $data['title'] = 'Account Home';
        return view('frontend.account.index', $data);
    }

    public function UpdateUserSettings(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'bio' => 'required',
            'facebook' => 'required',
            'twitter' => 'nullable|url',
            'image' => 'mimes:jpeg,jpg,|nullable|max:1000' // max 10000kb
        ]);

        $data = $request->only('name', 'bio', 'facebook', 'twitter', 'image');
        $data['id'] = auth()->user()->id;
        User::updateProfile($data);
        return back()->with('message', 'Account Information Updated.');
    }

    public function CreateArticle()
    {
        $data['title'] = 'Create Article';
        $data['categories'] = Category::where('status', 1)->get();
        return view('frontend.account.create_article', $data);
    }


    public function SaveArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|min:30',
            'category_id' => 'required',
            'description' => 'required|min:200',
        ]);
        $data = $request->only('title', 'category_id', 'description');
        User::saveArticle($data);
        return back()->with('message', 'Article Submitted for approval.');
    }

    public function EditArticle($id)
    {
        $data['title'] = 'Edit Article';
        $data['categories'] = Category::where('status', 1)->get();
        $data['article'] = Article::where('id', $id)->first();
        return view('frontend.account.edit_article', $data);
    }

    public function UpdateArticle(Request $request, $id)
    {
        $categories = implode(',', $request->category_id);
        $new = Article::find($id);
        $new->title = $request->title;
        $new->category_id = $categories;
        $new->description = $new->saveTextEditorImage($request->description);
        $new->save();

        return redirect('account/pending-articles')->with('message', 'Article Submitted for approval.');
    }

    public function MyArticles()
    {
        $data['title'] = 'Published Articles';
        $data['articles'] = Article::where('user_id', auth()->user()->id)->where('status', 1)->latest()->paginate(10);
        return view('frontend.account.articles', $data);
    }

    public function PendingArticles()
    {
        $data['title'] = 'Pending Articles';
        $data['articles'] = Article::where('user_id', auth()->user()->id)->where('status', 0)->latest()->paginate(10);

        return view('frontend.account.articles', $data);
    }

    public function FavoriteArticles()
    {
        $data['title'] = 'Favorite Articles';
        $data['articles'] = Article::with(['favorites' => function ($q) {
            return $q->where('user_id', auth()->user()->id);
        }])->whereHas('favorites')->latest()->paginate(10);
        return view('frontend.account.articles', $data);
    }

    public function SavedArticle()
    {
        $data['title'] = 'Saved Articles';
        return view('frontend.account.articles', $data);
    }

    public function SaveFavorite(Request $request)
    {
        $article_id = $request->id;
        $user_id = $request->user_id;

        $exist = Favorite::where(['article_id' => $article_id, 'user_id' => $user_id])->first();

        if ($exist == null) {
            $new = new Favorite();
            $new->article_id = $article_id;
            $new->user_id = $user_id;
            $new->save();

            $user_status = 1;
        } else {
            Favorite::where(['article_id' => $article_id, 'user_id' => $user_id])->delete();
            $user_status = 0;
        }

        $total = count(Favorite::where(['article_id' => $article_id])->get());

        $data = array(
            'user_status' => $user_status,
            'total_number' => $total
        );

        return response()->json($data);
    }
}
