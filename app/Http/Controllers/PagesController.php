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
}
