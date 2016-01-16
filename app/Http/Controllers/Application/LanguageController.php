<?php

namespace App\Http\Controllers\Application;

use App\Base\Controllers\ApplicationController;
use Input;

class LanguageController extends ApplicationController
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
