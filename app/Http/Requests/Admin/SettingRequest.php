<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class SettingRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'analytics_id'      => 'nullable|string|max:200|regex:/^UA-\d{4,9}-\d{1,4}$/i',
            'disqus_shortname'  => 'nullable|string|max:200',
            'email'             => 'email|max:200',
            'facebook'          => 'string|url|between:21,255',
            'logo'              => 'sometimes|max:2048|image',
            'twitter'           => 'string|url|between:18,255'
        ];
    }
}
