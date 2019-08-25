<?php

namespace App\Http\Controllers;

use App\Tweet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TweetController extends Controller
{
    public function __construct()
    {
        if (\Auth::check() == false) {
            return response()->json(['message' => 'invalid user'], 401);
        }
    }

    public function save(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ['title' => 'required|unique:tweets'], ['title.unique' => 'This title already exists!']);
            if ($validator->fails()) {
                return response()->json($validator->errors()->messages(), 422);
            }
            $time = Carbon::now();
            $data = $request->input();
            $data['created_at'] = $time;
            $data['updated_at'] = $time;
            $t = Tweet::create($data);
            return response()->json($t);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $time = Carbon::now();
            $data = $request->input();
            $data['updated_at'] = $time;
            Tweet::where('id', $id)->update($data);
            $tweet = Tweet::find($id);
            return response()->json($tweet);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            Tweet::destroy($id);
            return response()->json(true);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
