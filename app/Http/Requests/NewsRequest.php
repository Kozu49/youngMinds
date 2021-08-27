<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'news_date' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['banner_image' => 'required'];
        }

        return $rules;
//        return [
//            'title' => 'required',
//            'content' => 'required',
//            'banner_image' => 'required',
//            'news_date' => 'required',
//
//        ];
    }
}
