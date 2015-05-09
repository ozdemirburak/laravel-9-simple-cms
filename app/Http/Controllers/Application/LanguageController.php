<?php namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Session;
use Input;
use Redirect;

class LanguageController extends Controller {

    /**
     * Set the application language
     *
     * @return Response
     */
    public function postChange()
    {
        Session::put('language', Input::get('language'));
        return Redirect::back();
    }

}