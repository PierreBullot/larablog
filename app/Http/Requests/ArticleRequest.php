<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'post_title' => 'bail|required|max:250',
            'post_name' => 'bail|max:30|alpha',
            'post_content' => 'bail|required',
            'post_status' => 'bail|required|max:30|alpha',
            'post_category' => 'bail|required|max:30|alpha'
        ];
    }
}
