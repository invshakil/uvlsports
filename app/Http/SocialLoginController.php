<?php

namespace App\Http\Controllers;

use App\SocialAccount;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
	
	
	public function getSocialRedirect($provider)
	{
		$providerKey = Config ::get('services.' . $provider);
		
		if (empty($providerKey)) {
			
			return view('pages.status')
				-> with('error', 'No such provider');
			
		}
		
		return Socialite ::driver($provider) -> redirect();
	}
	
	
	public function getSocialHandle($provider)
	{
		
		if (Input ::get('denied') != '') {
			
			return redirect() -> to('/login')
				-> with('status', 'danger')
				-> with('message', 'You did not share your profile data with our social app.');
			
		}
		
		$user = Socialite ::driver($provider) -> user();
		
		$socialUser = null;
		
		//Check is this email present
		
		$userCheck = User ::where('email', '=', $user -> email) -> first();
		
		$email = $user -> email;
		
		if (!$user -> email) {
			$email = 'missing' . str_random(10);
		}
		
		// Here if user found with existing email goes to if condition
		if (!empty($userCheck)) {
			
			$data = array ('image' => $user -> avatar_original);
			User ::where('id', $userCheck -> id) -> update($data);
			
			auth() -> login($userCheck);
			
		} else {
			
			// LETS CREATE NEW USER
			
			$newSocialUser = new User;
			
			$newSocialUser -> email = $email;
			$newSocialUser -> name = $user -> name;
			$newSocialUser -> image = $user -> avatar_original;
			$newSocialUser -> role = 3;
			$newSocialUser -> password = bcrypt(str_random(16));
			
			$newSocialUser -> save();
			
			$socialData = new SocialAccount;
			$socialData -> user_id = $newSocialUser -> id;
			$socialData -> social_id = $user -> id;
			$socialData -> provider = $provider;
			$socialData -> save();
			
			$socialUser = $newSocialUser;
			
			auth() -> login($socialUser);
		}
		
		if (auth() -> user() -> role == 1) {
			
			return redirect() -> route('admin.dashboard');
			
		} elseif (auth() -> user() -> role == 2) {
			return redirect() -> route('admin.dashboard');
		}
		elseif (auth() -> user() -> role == 3) {
			return redirect() -> route('account');
		}
		
		return abort(500, 'User has no Role assigned, role is obligatory! You did not seed the database with the roles.');
		
	}
}
