<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request4 extends FormRequest
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
            'name'=>'required|string|max:77|min:2',
            'ordername'=>'required|string|max:100|min:3',
            'email'=>'required|string|max:77|min:7',
            'number'=>'required|string|max:25|min:9',
            'aboutorder'=>'required|string',
            'date'=>'required|date|date_format:Y-m-d'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Adinizi daxil edin',
            'ordername.required'=>'Sifarişin adını daxil edin',
            'email.required'=>'Emailinizi daxil edin',
            'number.required'=>'Nomrenizi daxil edin',
            'aboutorder.required'=>'Sifariş haqqında yazın',
            'date.required'=>'Tarixi yazın',
        ];
    }
}
