<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required|max:50000',
//            'image' => 'required|required|max:255',
//            'tag_id' =>  'required|max:255',
//            'topic_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('en.validate.email'),
            'content.required' => trans('en.validate.password'),
        ];
    }
}
