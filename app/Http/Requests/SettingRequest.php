<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SettingRequest extends Request
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
            'email'	=> 'required|email|min:7',
            'facebook' => 'sometimes|min:21|max:200',
            'twitter' => 'sometimes|min:18|max:200',
            'logo' => 'sometimes|max:2048|image',
            'status' => 'required|min:1|max:1'
        ];
	}

}
