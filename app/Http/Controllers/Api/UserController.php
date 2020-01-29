<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*
     * @param Request $request, UserId $id
     * Updating Profile
     * @returns boolean
     */

    function updateProfile(Request $request, $userId)
    {
        try {
            $request->validate([
                'name' => 'required|min:6',
                'bio' => 'required',
                'facebook' => 'nullable',
                'twitter' => 'nullable|url',
                'image' => 'mimes:jpeg,jpg,|nullable|max:1000' // max 10000kb
            ]);

            $data = $request->only('name', 'bio', 'facebook', 'twitter', 'image');
            $data['id'] = auth()->user()->id;
            User::updateProfile($data);
            return response()->json(['user' => auth()->user()]);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    /*
     * @param Request $request, UserId $id
     * Saving Article for admin consideration
     * @returns boolean
     */

    function saveArticle(Request $request, $articleId = false)
    {
        try {
            $request->validate([
                'title' => 'required|min:30',
                'category_id' => 'required',
                'description' => 'required|min:200',
            ]);

            $data = $request->only('title', 'category_id', 'description');
            if ($articleId) {
                $data['id'] = $articleId;
            }
            User::saveArticle($data);
            return response()->json(true);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    function myArticles(Request $request)
    {
        try {
            $articlesQuery = Article::where('user_id', auth()->user()->id);
             
            $articlesQuery = $articlesQuery->latest()->select('id', 'user_id', 'title', 'image', 'category_id', 'created_at', 'status');
            
            if ($request->has('status') && $request->input('status') != '*') {
                $articlesQuery = $articlesQuery->where('status', $request->input('status'));
            }

            if ($request->has('page')) {
                $set = $request->set;
                $page = $request->page * $set;
                $articles = $articlesQuery->skip($page)->take($set)->get();
            } else {
                $set = 10;
                $page = 0;
                $articles = $articlesQuery->skip($page)->take($set)->get();
            }

            return response()->json(['articles' => $articles]);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    function getArticleDetails(Request $request){
        try {
                $id = $request->id;
                $article = Article::where('id', $id)->first()->toArray();
                $article['category_id'] = explode(',', (int) $article['category_id']);
                return response()->json($article);
            } catch (\Exception $exception) {
                return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    function deleteArticle(Request $request, $id)
    {
        try {
                $article = Article::where('id', $id)->first();
                if ($article->image != ''){
                    (new Article)->unlinkPreviousImage($article->image);
                }
                Article ::destroy($id);

                return response()->json(true);
            } catch (\Exception $exception) {
                return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
