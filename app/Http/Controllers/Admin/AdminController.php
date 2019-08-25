<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\TweetPermission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Spatie\Analytics\Period;
use Validator;
use function back;
use function bcrypt;
use function count;

class AdminController extends Controller
{
    /*
      * DEFINING MASTER PAGE PAGE
      */

    function index()
    {

        $data = array();
        $data['title'] = 'Dashboard';
        $data['totalCategories'] = Category::get()->count();
        $data['totalRegisteredUsers'] = User::where('role', 3)->get()->count();
        $data['totalAuthors'] = User::whereHas('articles')->get()->count();
        $data['totalAdmins'] = User::whereIn('role', [1, 2])->get()->count();
        $data['totalPublishedArticle'] = Article::where('status', 1)->get()->count();
        $data['totalPendingArticle'] = Article::where('status', 0)->get()->count();

        //retrieve visitors and pageviews since the 6 months ago
        $data['lastThirtyDaysTotalVisitorsAndPageViews'] = \Cache::remember('lastThirtyDaysTotalVisitorsAndPageViews', 60, function () {
            $dates = [];
            $visitors = [];
            $pageViews = [];
            $data = \Analytics::fetchTotalVisitorsAndPageViews(Period::days(30))->sortBy('date')->values();
            foreach ($data as $item) {
                $date = date('d F', strtotime($item['date']));
                array_push($dates, $date);
                array_push($visitors, $item['visitors'] ? $item['visitors'] : 0);
                array_push($pageViews, $item['pageViews'] ? $item['pageViews'] : 0);
            }
            return json_encode(['label' => $dates, 'visitors' => $visitors, 'pageViews' => $pageViews]);
        });
        $data['mostVisitedPage'] = \Cache::remember('mostVisitedPage', 60, function () {
            return \Analytics::fetchMostVisitedPages(Period::months(6))->take(6); //Table
        });
        //$topTenReferrers = Analytics::fetchTopReferrers(Period::months(6))->take(10);
        $data['userType'] = \Cache::remember('userType', 60, function () {
            return \Analytics::fetchUserTypes(Period::months(6)); // Pie Chart
        })->toJson();

        return view('backend/dynamic/dashboard')->with($data);
    }

    /*
     * DEFINING ADD USER PAGE
     */

    function add_user()
    {

        $data = array();
        $data['title'] = 'Add User';
        $data['module_navigation'] = view('backend/module_navigation/user_management', $data);
        return view('backend/dynamic/user_management/add_user')->with($data);
    }

    function saveUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:50',
            'name' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $new = new User();
        $new->name = $request->name;
        $new->email = $request->email;
        $new->address = $request->address;
        $new->phone = $request->phone;
        $new->role = $request->role;
        $new->password = bcrypt($request->password);
        $new->save();

        $notification = array(
            'message' => 'User Created Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /*
     * DEFINING MANAGE USER PAGE
     */

    function manage_user(Request $request)
    {


        $data = array();
        $data['title'] = 'Manage User';
        $data['module_navigation'] = view('backend/module_navigation/user_management', $data);

        if (count($request->all()) > 0) {
            $string = $request->string;
            $data['users'] = User::with('hasTweetPermission')
                ->where('name', "LIKE", "%" . $string . "%")
                ->orWhere('email', "LIKE", "%" . $string . "%")
                ->orderBy('role', 'asc')->paginate(20);
        } else {
            $data['users'] = User::orderBy('role', 'asc')->with('hasTweetPermission')->orderBy('created_at', 'desc')->paginate(20);
        }


        return view('backend/dynamic/user_management/user_list')->with($data);
    }

    function deleteUser($id)
    {
        User::destroy($id);

        $notification = array(
            'message' => 'User deleted Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }

    function promoteUser($id)
    {
        $current_role = User::where('id', $id)->value('role');

        if ($current_role == 3) {
            User::where('id', $id)->update(['role' => 2]);

            $notification = array(
                'message' => 'Promoted to moderator Successfully!',
                'alert-type' => 'success'
            );

        } elseif ($current_role == 2) {
            User::where('id', $id)->update(['role' => 1]);

            $notification = array(
                'message' => 'Promoted to Admin Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'This user already has Admin/Mod role!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }


        return back()->with($notification);

    }

    function demoteUser($id)
    {
        $current_role = User::where('id', $id)->value('role');

        if ($current_role == 2) {
            User::where('id', $id)->update(['role' => 3]);

            $notification = array(
                'message' => 'Demoted to User Successfully!',
                'alert-type' => 'success'
            );

        } elseif ($current_role == 1) {
            User::where('id', $id)->update(['role' => 2]);

            $notification = array(
                'message' => 'Demoted to Moderator Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'This user has User role currently!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }


        return back()->with($notification);


    }

    function tweetAccessForUser($id)
    {
        $user = User::find($id);
        if (!$user->hasTweetPermission) {
            $new = new TweetPermission();
            $new->user_id = $id;
            $new->save();
            $notification = array(
                'message' => 'Tweet Access granted!',
                'alert-type' => 'success'
            );
        } else {
            TweetPermission::where('user_id', $id)->delete();
            $notification = array(
                'message' => 'Tweet Access revoked!',
                'alert-type' => 'error'
            );
        }


        return back()->with($notification);
    }

    /*
     * DEFINING USER ROLE PAGE
     */

    function user_role()
    {
        $data = array();
        $data['title'] = 'Manage User';
        $data['module_navigation'] = view('backend/module_navigation/user_management', $data);
        return view('backend/dynamic/user_management/user_role')->with($data);
    }

    /*
     * DEFINING SYSTEM SETTINGS PAGE
     */

    function system_settings()
    {

        $data = array();

        $data['system_name'] = DB::table('system_settings')->where('name', 'system_name')->value('value');
        $data['system_email'] = DB::table('system_settings')->where('name', 'system_email')->value('value');
        $data['address'] = DB::table('system_settings')->where('name', 'address')->value('value');
        $data['phone'] = DB::table('system_settings')->where('name', 'phone')->value('value');
        $data['logo'] = DB::table('system_settings')->where('name', 'logo')->value('value');

        $data['facebook'] = DB::table('system_settings')->where('name', 'facebook')->value('value');
        $data['twitter'] = DB::table('system_settings')->where('name', 'twitter')->value('value');
        $data['google'] = DB::table('system_settings')->where('name', 'google')->value('value');
        $data['youtube'] = DB::table('system_settings')->where('name', 'youtube')->value('value');
        $data['linkedin'] = DB::table('system_settings')->where('name', 'linkedin')->value('value');

        $data['official_email'] = DB::table('system_settings')->where('name', 'official_email')->value('value');
        $data['password'] = DB::table('system_settings')->where('name', 'password')->value('value');
        $data['host'] = DB::table('system_settings')->where('name', 'host')->value('value');
        $data['port'] = DB::table('system_settings')->where('name', 'port')->value('value');

        $data['title'] = 'System Settings';
        return view('backend/dynamic/system_settings')->with($data);
    }

    /*
     * DEFINING ACCOUNT SETTINGS
     */

    function account_settings()
    {
        $data = array();
        $data['title'] = 'Account Settings';
        return view('backend/dynamic/account_settings')->with($data);
    }

    function save_system_settings(Request $request)
    {
        $name = $request->name;
        DB::table('system_settings')->where('name', 'system_name')->update(['value' => $name]);

        $email = $request->email;
        DB::table('system_settings')->where('name', 'system_email')->update(['value' => $email]);

        $phone = $request->phone;
        DB::table('system_settings')->where('name', 'phone')->update(['value' => $phone]);

        $facebook = $request->facebook;
        DB::table('system_settings')->where('name', 'facebook')->update(['value' => $facebook]);

        $twitter = $request->twitter;
        DB::table('system_settings')->where('name', 'twitter')->update(['value' => $twitter]);

        $google = $request->google;
        DB::table('system_settings')->where('name', 'google')->update(['value' => $google]);

        $youtube = $request->youtube;
        DB::table('system_settings')->where('name', 'youtube')->update(['value' => $youtube]);

        $linkedin = $request->linkedin;
        DB::table('system_settings')->where('name', 'linkedin')->update(['value' => $linkedin]);

        $notification = array(
            'message' => 'Systems Information Saved Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }


    public function save_system_mail_config(Request $request)
    {
        $official_email = $request->official_email;
        DB::table('system_settings')->where('name', 'official_email')->update(['value' => $official_email]);

        $password = $request->password;
        DB::table('system_settings')->where('name', 'password')->update(['value' => $password]);

        $host = $request->host;
        DB::table('system_settings')->where('name', 'host')->update(['value' => $host]);

        $port = $request->port;
        DB::table('system_settings')->where('name', 'port')->update(['value' => $port]);

        $notification = array(
            'message' => 'Mail Configuration Saved Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }

    function save_system_logo(Request $request)
    {
        $image = Input::file('logo');
        $filename = 'system_logo.' . $image->getClientOriginalExtension();

        $path = public_path('image_upload/' . $filename);


        Image::make($image->getRealPath())->resize(245, 245, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);

        DB::table('system_settings')->where('name', 'logo')->update(['value' => 'image_upload/' . $filename]);

        $notification = array(
            'message' => 'Systems Information Saved Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

}
