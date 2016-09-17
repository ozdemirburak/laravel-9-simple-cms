<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CategoryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'color'       => 'required|string|between:4,7',
            'description' => 'required|string|max:160',
            'language_id' => 'required|integer',
            'title'       => 'required|string|max:200'
        ];
    }
}
