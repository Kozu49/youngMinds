<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'notice_date' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['notice_banner' => 'required'];
            $rules += ['notice_file' => 'required'];
        }

        return $rules;
//        return [
//            'title' => 'required',
//            'content' => 'required',
//            'notice_file' => 'required',
//            'notice_banner' => 'required',
//            'notice_date' => 'required',
//        ];
    }
}
