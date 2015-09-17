<?php

namespace App\Http\Requests\Admin;

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
            'analytics_id'      => 'max:255',
            'disqus_shortname'  => 'max:255',
            'email'	            => 'required|email|min:7',
            'facebook'          => 'min:21|url|max:255',
            'logo'              => 'sometimes|max:2048|image',
            'twitter'           => 'min:18|url|max:255'
        ];
    }

}
