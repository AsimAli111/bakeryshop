<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request2 extends FormRequest
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
            'kitchenname'=>'required|string|max:77|min:2'
        ];
    }
    public function messages()
    {
        return [
            'kitchenname'=>'Metbexin adini duzgun daxil edin'
        ];
    }
}
