<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
           'name' => ['nullable' , 'string' , 'min:2' , 'max:50'],
           'family' => ['nullable' , 'string' , 'min:2' , 'max:50'],
           'email' => ['nullable' , 'email'],
           'avatar' => ['nullable' , 'file' , 'mimes:jpg,bmp,png'],
        ];
    }
}
