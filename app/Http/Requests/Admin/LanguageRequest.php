<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LanguageRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'code'			   => 'required|max:6|unique:languages,code,'.$this->segment(3),
			'flag' 			   => 'sometimes|max:2048|image',
			'site_description' => 'required|max:160',
            'site_title' 	   => 'required|max:160',
			'title' 		   => 'required|min:3'
		];
	}

}
