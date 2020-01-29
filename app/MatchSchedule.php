<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchSchedule extends Model
{
    //
	public function game_week()
	{
		return $this->belongsTo(GameWeek::class);
	}
	
	public function tournament()
	{
		return $this->belongsTo(Tournament::class);
	}

	protected $appends = ['formatted_time'];

	public function getFormattedTimeAttribute()
    {
        return date('h:i A | dS, F Y', strtotime($this->time));
    }
}
