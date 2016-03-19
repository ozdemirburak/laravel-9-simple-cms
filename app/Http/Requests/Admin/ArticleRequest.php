<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'  => 'required|integer',
            'content'      => 'required',
            'description'  => 'required|max:160',
            'published_at' => 'required|date',
            'title'        => 'required|string|max:200'
        ];
    }
}
