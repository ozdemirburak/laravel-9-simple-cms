<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class PageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content'     => 'required',
            'description' => 'required|max:160',
            'language_id' => 'required|integer',
            'title'       => 'required|min:3',
        ];
    }
}
