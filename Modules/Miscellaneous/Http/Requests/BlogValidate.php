<?php

namespace Modules\Miscellaneous\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogValidate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'blog_title' => 'required|max:255' ,
            'blog_description' => 'required', 
            'meta_title' => 'required|max:100',
            'meta_keyword' => 'required|max:255', 
            'meta_description' => 'required|max:180',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
