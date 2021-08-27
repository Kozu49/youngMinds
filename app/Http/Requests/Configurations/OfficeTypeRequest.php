<?php

namespace App\Http\Requests\Configurations;

use Illuminate\Foundation\Http\FormRequest;

class OfficeTypeRequest extends FormRequest
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
            'office_type_name' => 'required',
        ];
    }
}
