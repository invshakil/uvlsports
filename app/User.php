<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'bio', 'user_fb', 'user_tw', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function articles()
	{
		return $this->hasMany(Article ::class, 'user_id', 'id');
	}
	
	public function profile()
	{
		return $this->hasOne(Profile ::class, 'user_id', 'id');
	}

    public function profiles()
    {
        return $this->hasMany(Profile ::class, 'user_id', 'id');
    }
	
	public function favorites()
	{
		return $this->hasMany(Favorite ::class, 'user_id', 'id');
	}

    public function getUserAvatarAttribute()
    {
        if ($this->image == null) {
            return 'https://www.infrascan.net/demo/assets/img/avatar5.png';
        } else if (strpos($this->image, "http") > -1) {
            return $this->image;
        } else {
            $imagePath = asset(substr($this->image, 1));
            $fileExists = file_exists(public_path() . substr($this->image, 1));
            if ($fileExists)
                return $imagePath;
            else
                return 'https://www.infrascan.net/demo/assets/img/avatar5.png';
        }
    }

    public function getTwitterAttribute()
    {
        if ($this->user_tw !== '' && substr($this->user_tw, 0, 4) !== "http") {
            return 'https://twitter.com/' . $this->user_tw;
        } else if ($this->user_tw !== null && substr($this->user_tw, 0, 4) === "http") {
            return $this->user_tw;
        }

        return null;

    }
}
