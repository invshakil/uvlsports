<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    //
	public function match_schedule()
	{
		return $this->hasMany(MatchSchedule::class);
	}
}
