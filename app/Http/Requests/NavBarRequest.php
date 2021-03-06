<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NavBarRequest extends FormRequest
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
            'navbar' => 'required',
            'url' => 'required|unique:nav_bars|regex:/^[a-zA-Z]+$/u',

        ];
    }
}
