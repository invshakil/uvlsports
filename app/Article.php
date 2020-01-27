<?php

namespace App;

use App\Image\ImagePaths;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Article extends Model
{
    public function category($id)
    {
        $categories = \Cache::remember('categories', 3600, function (){
            return Category::select('id', 'name', 'bangla_name')->get();
        });
        return $categories->where('id', $id)->first() ? $categories->where('id', $id)->first() : null;
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

    protected $appends = ['full_image', 'medium_image', 'time_format'];


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
            return asset(defaultImage());
        }
    }

    public function getMediumImageAttribute()
    {
        $imagePath = ImagePaths::$articleImage . 'resized/' . $this->image;
        if ($this->image != null && file_exists($imagePath)) {
            return asset($imagePath);
        } else {
            return asset(defaultImage());
        }
    }

    public function getThumbImageAttribute()
    {
        $imagePath = ImagePaths::$articleImage . 'thumbs/' . $this->image;
        if ($this->image != null && file_exists($imagePath)) {
            return asset($imagePath);
        } else {
            return asset(defaultImage());
        }
    }

    public function getTimeFormatAttribute()
    {
        return $this->created_at ? $this->created_at->diffForHumans() : $this->created_at;
    }


    public function favByUser($favorites, $user_id)
    {
        $status = collect($favorites)->where('user_id', $user_id)->first();
        return ($status) ? 1 : 0;
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


    public function saveTextEditorImage($detail)
    {
        $dom = new \domdocument();
        @$dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getelementsbytagname('img');

        if (!File::exists(public_path(ImagePaths::$articleImage))) {
            File::makeDirectory(public_path() . '/' . ImagePaths::$articleImage, 0777, true, true);
        }
        foreach ($images as $k => $img) {
            $data = $img->getattribute('src');
            $check_image = substr($data, 0, 10);
            if ($check_image != "data:image") {
                continue;
            }
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            $image_name = time() . $k . '.png';
            $path = public_path("/") . ImagePaths::$articleImage . $image_name;
            file_put_contents($path, $data);
            $img->removeattribute('src');
            $img->setattribute('src', asset(ImagePaths::$articleImage . $image_name));
        }

        return $detail = $dom->savehtml();
    }
}
