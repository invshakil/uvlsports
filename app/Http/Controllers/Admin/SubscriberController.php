<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $data['title'] = 'Subscriber List';

        $query = Subscriber::latest();
        if ($request->has('string') && $request->input('string') != null) {
            $query = $query->where('email', $request->input('string'));
        }
        $data['subscribers'] = $query->paginate(20);

        return view('backend.dynamic.subscribers.index', $data);
    }

    public function delete($id)
    {
        Subscriber::destroy($id);
        $notification = array(
            'message' => 'Subscriber Deleted Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
