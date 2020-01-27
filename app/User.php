<?php

namespace App;

use App\Events\NewArticleSubmitted;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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

    public function hasTweetPermission()
    {
        return $this->hasOne(TweetPermission::class, 'user_id');
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

    public static function updateProfile($data)
    {
        $update = User::find($data['id']);
        $update->name = $data['name'];
        $update->bio = $data['bio'];
        $update->user_fb = $data['facebook'];
        $update->user_tw = $data['twitter'];

        if (isset($data['image']) && $data['image'] != null) {
            $prevImage = auth()->user()->image;
            if ($prevImage != '' && $prevImage != null && file_exists(asset($prevImage))) {
                unlink(asset($prevImage)); // delete file/image
            }
            $image = $data['image'];
            $filename = 'user_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/image_upload/users/' . $filename);
            Image::make($image->getRealPath())->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);

            $update->image = '/image_upload/users/' . $filename;
        }

        $update->save();
        return true;
    }

    public static function saveArticle($data)
    {
        $categories = implode(',', $data['category_id']);
        $new = new Article();
        $new->title = $data['title'];
        $new->category_id = $categories;
        $new->description = $new->saveTextEditorImage($data['description']);
        $new->user_id = auth()->user()->id;
        $new->save();

        $articleData = [
            'article_id' => $new->id,
            'author' => $new->author->name,
            'title' => $new->title,
            'created_at' => $new->created_at->format('d, F Y h:i A'),
        ];
        return event(new NewArticleSubmitted(adminEmails(), $articleData));
    }
}
