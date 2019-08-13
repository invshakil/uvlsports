<?php

namespace App\Http\Controllers\Admin;

use App\GameWeek;
use App\Http\Controllers\Controller;
use App\MatchSchedule;
use App\Tournament;
use Illuminate\Http\Request;
use Validator;

class TvScheduleController extends Controller
{
	//
	public function CreateGameWeek(Request $request)
	{
		$data = array ();
		$data['title'] = 'Create Game Week';
		$data['module_navigation'] = view('backend/module_navigation/tv_schedule', $data);
		
		if (count($request -> all()) > 0) {
			$string = $request -> string;
			$data['game_weeks'] = GameWeek ::where('name', "LIKE", "%" . $string . "%")
				-> latest() -> paginate(10);
		} else {
			$data['game_weeks'] = GameWeek ::latest() -> paginate(10);
		}
		
		return view('backend/dynamic/tv_schedule/game_weeks') -> with($data);
	}
	
	function SaveGameWeek(Request $request)
	{
		$validator = Validator ::make($request -> all(), [
			'name' => 'required|unique:game_weeks|max:50',
		]);
		
		if ($validator -> fails()) {
			return redirect()
				-> back()
				-> withErrors($validator)
				-> withInput();
		}
		
		$new = new GameWeek();
		$new -> name = $request -> name;
		$new -> status = $request -> status;
		
		$new -> save();
		
		$notification = array (
			'message' => 'Game Week Information Saved Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
	
	function UpdateGameWeek(Request $request)
	{
		$id = $request->id;
		
		$new = GameWeek::find($id);
		$new -> name = $request -> name;
		$new -> status = $request -> status;
		
		$new -> save();
		
		$notification = array (
			'message' => 'Game Week Information Updated Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
	
	function DeleteGameWeek($id)
	{
		GameWeek::destroy($id);
		
		$notification = array (
			'message' => 'Game Week Information Deleted Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
	
	
	public function CreateMatchesInfo(Request $request)
	{
		$data = array ();
		$data['title'] = 'Create Matches Information';
		$data['module_navigation'] = view('backend/module_navigation/tv_schedule', $data);
		
		if (count($request -> all()) > 0) {
			$string = $request -> string;
			$data['match_schedules'] = MatchSchedule ::with('game_week', 'tournament')->where('title', "LIKE", "%" . $string . "%")
				-> latest() -> paginate(10);
		} else {
			$data['match_schedules'] = MatchSchedule ::with('game_week', 'tournament')->latest() -> paginate(10);
		}
		
		$data['game_weeks'] = GameWeek ::latest() -> where('status', 1)->get();
		$data['tournaments'] = Tournament ::orderBy('name','asc')-> where('status', 1)->get();
		
		return view('backend/dynamic/tv_schedule/match_info') -> with($data);
	}
	
	
	function SaveMatchesInfo(Request $request)
	{
		$validator = Validator ::make($request -> all(), [
			'title' => 'required|unique:match_schedules|max:50',
		]);
		
		if ($validator -> fails()) {
			return redirect()
				-> back()
				-> withErrors($validator)
				-> withInput();
		}
		
		$new = new MatchSchedule();
		$new -> title = $request -> title;
		$new -> game_week_id = $request -> game_week_id;
		$new -> tournament_id = $request -> tournament_id;
		$new -> time = $request -> time;
		$new -> channel_name = $request -> channel_name;
		$new -> status = $request -> status;
		
		$new -> save();
		
		$notification = array (
			'message' => 'Match Schedule Information Saved Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
	
	function UpdateMatchesInfo(Request $request)
	{
		$id = $request->id;
		
		$new = MatchSchedule::find($id);
		$new -> title = $request -> title;
		$new -> game_week_id = $request -> game_week_id;
		$new -> tournament_id = $request -> tournament_id;
		$new -> time = $request -> time;
		$new -> channel_name = $request -> channel_name;
		$new -> status = $request -> status;
		
		$new -> save();
		
		$notification = array (
			'message' => 'Match Schedule Information Updated Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
	
	function DeleteMatchesInfo($id)
	{
		MatchSchedule::destroy($id);
		
		$notification = array (
			'message' => 'Match Schedule Information Deleted Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
	
	
	
	public function CreateTournament(Request $request)
	{
		$data = array ();
		$data['title'] = 'Create Tournament';
		$data['module_navigation'] = view('backend/module_navigation/tv_schedule', $data);
		
		if (count($request -> all()) > 0) {
			$string = $request -> string;
			$data['tournaments'] = Tournament ::where('name', "LIKE", "%" . $string . "%")
				-> latest() -> paginate(10);
		} else {
			$data['tournaments'] = Tournament ::latest() -> paginate(10);
		}
		
		return view('backend/dynamic/tv_schedule/tournaments') -> with($data);
	}
	
	
	
	function SaveTournament(Request $request)
	{
		$validator = Validator ::make($request -> all(), [
			'name' => 'required|unique:tournaments|max:50',
		]);
		
		if ($validator -> fails()) {
			return redirect()
				-> back()
				-> withErrors($validator)
				-> withInput();
		}
		
		$new = new Tournament();
		$new -> name = $request -> name;
		$new -> status = $request -> status;
		
		$new -> save();
		
		$notification = array (
			'message' => 'Tournament Information Saved Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
	
	function UpdateTournament(Request $request)
	{
		$id = $request->id;
		
		$new = Tournament::find($id);
		$new -> name = $request -> name;
		$new -> status = $request -> status;
		
		$new -> save();
		
		$notification = array (
			'message' => 'Tournament Information Updated Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
	
	function DeleteTournament($id)
	{
		Tournament::destroy($id);
		
		$notification = array (
			'message' => 'Tournament Information Deleted Successfully!',
			'alert-type' => 'success'
		);
		
		return back() -> with($notification);
	}
}
