<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
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
}
