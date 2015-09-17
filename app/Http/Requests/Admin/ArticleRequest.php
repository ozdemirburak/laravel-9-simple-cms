<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
			'category_id'  => 'required|integer',
			'content' 	   => 'required',
			'description'  => 'required|max:160',
			'published_at' => 'required|date',
            'title' 	   => 'required|min:3'
        ];
	}

}
