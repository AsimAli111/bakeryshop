<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request3 extends FormRequest
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
            'surname'=>'required|string|max:77|min:2',
            'age'=>'required|numeric|max:99|min:18',
            'email'=>'required|string|max:77|min:7',
            'number'=>'required|string|max:25|min:9',
            'address'=>'required|string|max:100|min:4',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Adinizi daxil edin',
            'surname.required'=>'Soy Adinizi daxil edin',
            'age.required'=>'Yasinizi daxil edin',
            'email.required'=>'Emailinizi daxil edin',
            'number.required'=>'Nomrenizi daxil edin',
            'address.required'=>'Unvanizi daxil edin',
        ];
    }
}
