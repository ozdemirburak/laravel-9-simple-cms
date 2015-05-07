<?php namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Language;
use Session;
use Config;

class HomeController extends Controller {

	/**
	 * Show the application homepage to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $language = Session::get('language', Config::get('app.locale'));
        $articles = Language::whereCode($language)->first()->articles()->published()->orderBy('published_at','desc')->paginate(5);
        return view('application.home.index', compact('articles'));
	}

}
