<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ingamerole;
use App\Match;
use App\Siterole;
use App\Team;
use App\Teamrole;
use App\User;

class DatabaseController extends Controller
{
    /* USERS TABLE */

    public function saveUser(Request $request, $id) {
		if (Auth::user()->siterole_id < 2) {
			return redirect()->route('manage');
		}
		
		$userToUpdate = User::find($id);
		$userToUpdate->siterole_id = $request->siterole_id;
		$userToUpdate->team_id = $request->team_id;
		$userToUpdate->teamrole_id = $request->teamrole_id;
		$userToUpdate->ingamerole_id = $request->ingamerole_id;
		$userToUpdate->save();

		return redirect()->route('manage');
	}

    /* TEAMS TABLE */

	public function saveTeam(Request $request, $id) {
		if (Auth::user()->siterole_id < 2) {
			return redirect()->route('manage');
		}
		
		$team = Team::find($id);
		$team->tag = $request->tag;
		$team->name = $request->name;
		$team->save();

		return redirect()->route('manage');
	}

	public function createTeam(Request $request) {
		if (Auth::user()->siterole_id < 2) {
			return redirect()->route('manage');
		}

		$team = new Team;
		$team->tag = $request->tag;
		$team->name = $request->name;
		$team->save();

		return redirect()->route('manage');
	}
}
