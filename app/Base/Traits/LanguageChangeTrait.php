<?php

namespace App\Base\Traits;

use Input;

trait LanguageChangeTrait
{
    /**
     * Change language
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChange()
    {
        session(['language' => Input::get('language')]);
        return back();
    }
}
