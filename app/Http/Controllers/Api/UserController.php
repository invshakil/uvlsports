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

    function savePendingArticle(Request $request, $userId)
    {
        try {
            $request->validate([
                'title' => 'required|min:30',
                'category_id' => 'required',
                'description' => 'required|min:200',
            ]);

            $data = $request->only('title', 'category_id', 'description');
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
            if ($request->has('pending')) {
                $articlesQuery = $articlesQuery->where('status', 0);
            } elseif ($request->has('published')) {
                $articlesQuery = $articlesQuery->where('status', 1);
            }
            $articles = $articlesQuery->latest()->select('id', 'user_id', 'title', 'image', 'categories')->paginate(10);
            $data = $request->only('title', 'category_id', 'description');
            User::saveArticle($data);
            return response()->json(true);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
