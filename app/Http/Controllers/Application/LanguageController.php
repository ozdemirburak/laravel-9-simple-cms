<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Input;

class LanguageController extends Controller
{
    /**
     * Set the application language
     *
     * @return Response
     */
    public function postChange()
    {
        session(['language' => Input::get('language')]);
        return back();
    }

}