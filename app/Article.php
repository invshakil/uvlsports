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

}
