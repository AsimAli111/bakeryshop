<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request1 extends FormRequest
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
            'productname'=>'required|string|max:77|min:2',
            'productcontent'=>'required|string|max:150|min:2',
            'kitchen'=>'required|numeric|max:8000|min:1',
            'price'=>'required|string|max:77|min:1',
            'branch'=>'required|string|max:77|min:2',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif',
        ];
    }
    public function messages()
    {
        return [
            'productname.required'=>'Adi duzgun daxil edin',
            'productcontent.required'=>'Terkibi duzgun daxil edin',
            'kitchen.required'=>'Metbexin adini duzgun daxil edin',
            'price.required'=>'Qiymeti duzgun daxil edin',
            'branch.required'=>'Filiadlin adini duzgun daxil edin',
            'image.required'=>'Seklin adini duzgun daxil edin',
        ];
    }
}
