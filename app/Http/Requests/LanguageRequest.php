<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Language;

class LanguageRequest extends Request {

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
            'title' => 'required|min:3',
            'code'	=> 'required|max:6|unique:languages,code,'.$this->segment(3),
            'site_title' => 'required|max:160',
            'site_description' => 'required|max:160',
            'flag' => 'sometimes|max:2048|image'
		];
	}

}
