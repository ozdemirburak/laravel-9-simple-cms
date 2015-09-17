<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
			'color' 	  => 'required|min:4|max:7',
			'description' => 'required|max:160',
			'language_id' => 'required|integer',
			'title' 	  => 'required|min:3'
		];
	}

}
