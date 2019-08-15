<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    public static function setWidget($key, $widget)
    {
        $old = self::where('option', $key)->first();
        if ($old) {
            $old->value = $widget;
            $old->save();
            return;
        }
        $set = new Widget();
        $set->option = $key;
        $set->value = $widget;
        $set->save();
    }

    public static function getWidget($key)
    {
        $widget = static::where('option', $key)->first();

        if ($widget) {
            return $widget->value;
        } else {
            return null;
        }
    }
}
