<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameWeek extends Model
{
    //
	public function match_schedule()
	{
		return $this->hasMany(MatchSchedule::class);
	}
}
