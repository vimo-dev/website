<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Post;
use App\User;
use App\Team;
use Mail;
use Session;


class PagesController extends Controller {
	public function getHome() {
		return view('pages.home');
	}

	public function getRoster() {
		return view('pages.roster');
	}

	public function getMatches() {
		return view('pages.matches');
	}

	public function getManage(Request $request) {
		$users = User::where('username', '!=', 'NULL')->orderBy('name', 'desc')->get();
		$teams = Team::where('name', '!=', 'NULL')->orderBy('name', 'desc')->get();

		if(isset($request->tabletoedit)) {
			return view('pages.manage', ['users' => $users, 'teams' => $teams, 'tabletoedit' => $request->tabletoedit, 'id' => $request->id]);
		}
		return view('pages.manage', ['users' => $users, 'teams' => $teams]);
	}

	public function saveUser(Request $request, $id) {
		if (Auth::user()->role < 2) {
			return redirect()->route('manage');
		}
		
		$userToUpdate = User::find($id);
		$userToUpdate->role = $request->role;
		$userToUpdate->team_id = $request->team_id;
		$userToUpdate->save();

		return redirect()->route('manage');
	}

	public function saveTeam(Request $request, $id) {
		if (Auth::user()->role < 2) {
			return redirect()->route('manage');
		}
		
		$team = Team::find($id);
		$team->tag = $request->tag;
		$team->name = $request->name;
		$team->save();

		return redirect()->route('manage');
	}

	public function createTeam(Request $request) {
		if (Auth::user()->role < 2) {
			return redirect()->route('manage');
		}

		$team = new Team;
		$team->tag = $request->tag;
		$team->name = $request->name;
		$team->save();

		return redirect()->route('manage');
	}
}
