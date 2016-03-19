<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LanguageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'             => 'required|string|max:6|unique:languages,code,'.$this->segment(3),
            'flag'             => 'sometimes|max:2048|image',
            'site_description' => 'required|string|max:160',
            'site_title'       => 'required|string|max:160',
            'title'            => 'required|string|max:200'
        ];
    }
}
