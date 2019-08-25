<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['title', 'description', 'image'];

    protected $appends = ['time'];

    public function getTimeAttribute()
    {
        return $this->updated_at ? $this->updated_at->diffForHumans() : $this->created_at->diffForHumans();
    }

    public function isAllowed()
    {
        if (!auth()->check()) {
            return false;
        }
        if (in_array(auth()->user()->role, [1, 2])) {
            return true;
        }
        if (auth()->user()->hasTweetPermission) {
            return true;
        }
        return false;
    }

}
