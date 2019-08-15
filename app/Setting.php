<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'system_settings';

    public static function setSetting($key, $setting)
    {
        $old = self::where('name', $key)->first();
        if ($old) {
            $old->value = $setting;
            $old->save();
            return;
        }
        $set = new Setting();
        $set->name = $key;
        $set->value = $setting;
        $set->save();
    }

    public static function getSetting($key)
    {
        $setting = static::where('name', $key)->first();

        if ($setting) {
            return $setting->value;
        } else {
            return null;
        }
    }
}
