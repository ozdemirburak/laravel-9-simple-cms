<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|email|min:6|unique:users,email,'.$this->segment(3),
            'name'      => 'required|min:3',
            'password'  => 'required|confirmed|min:6|max:20',
            'picture'   => 'sometimes|max:2048|image'
        ];
    }
}
