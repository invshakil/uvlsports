<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
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
        $image = asset('image_upload/post_image/' . $this->image);
        if ($this->image != null && file_exists($image)) {
            return $image;
        } else {
            return 'https://via.placeholder.com/275x160';
        }
    }

    public function getMediumImageAttribute()
    {
        $image = asset('image_upload/post_image/resized/' . $this->image);
        if ($this->image != null && file_exists($image)) {
            return $image;
        } else {
            return 'https://via.placeholder.com/275x160';
        }
    }

    public function getThumbImageAttribute()
    {
        $image = asset('image_upload/post_image/thumbs/' . $this->image);
        if ($this->image != null && file_exists($image)) {
            return $image;
        } else {
            return 'https://via.placeholder.com/80x45';
        }
    }




}
