<?php

namespace App;

use App\Image\ImagePaths;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category($id)
    {
        return Category::where('id', $id)->value('name');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite ::class, 'article_id', 'id');
    }

    public function favByUser($favorites, $user_id)
    {
        $status = collect($favorites)->where('user_id', $user_id)->first();
        return ($status) ? 1 : 0;
    }

    public function getCardTitleAttribute()
    {
        return strlen($this->title) > 85 ? strLimit($this->title, 85) : $this->title;
    }

    public function getSliderTitleAttribute()
    {
        return strlen($this->title) > 80 ? strLimit($this->title, 80) : $this->title;
    }

    public function getSidebarTitleAttribute()
    {
        return strlen($this->title) > 60 ? strLimit($this->title, 60) : $this->title;
    }


    public function getFullImageAttribute()
    {
        $imagePath = ImagePaths::$articleImage . $this->image;
        if ($this->image != null && file_exists($imagePath)) {
            return asset($imagePath);
        } else {
            return 'https://via.placeholder.com/275x160';
        }
    }

    public function getMediumImageAttribute()
    {
        $imagePath = ImagePaths::$articleImage . 'resized/' . $this->image;
        if ($this->image != null && file_exists($imagePath)) {
            return asset($imagePath);
        } else {
            return 'https://via.placeholder.com/275x160';
        }
    }

    public function getThumbImageAttribute()
    {
        $imagePath = ImagePaths::$articleImage . 'thumbs' . $this->image;
        if ($this->image != null && file_exists($imagePath)) {
            return asset($imagePath);
        } else {
            return 'https://via.placeholder.com/80x45';
        }
    }


    public function unlinkPreviousImage($fileName)
    {
        $basePath = ImagePaths::$articleImage;
        if (file_exists(public_path($basePath . $fileName))) // make sure it exits inside the folder
        {
            unlink(public_path($basePath . $fileName)); // delete file/image
        }
        if (file_exists(public_path($basePath . 'resized/' . $fileName))) // make sure it exits inside the folder
        {
            unlink(public_path($basePath . 'resized/' . $fileName)); // delete file/image
        }
        if (file_exists(public_path($basePath . 'thumbs/' . $fileName))) // make sure it exits inside the folder
        {
            unlink(public_path($basePath . 'thumbs/' . $fileName)); // delete file/image
        }
        return true;
    }
}
