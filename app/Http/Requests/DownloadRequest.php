<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DownloadRequest extends FormRequest
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
            'created_date' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['file' => 'required'];
        }

        return $rules;
//        return [
//            'title' => 'required',
//            'file' => 'required',
//            'created_date' => 'required',
////            'user_id' => 'required',
//        ];
    }
}
