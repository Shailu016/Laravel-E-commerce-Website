<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'title'=>'required', 
              'excerpt'=>'required', 
              'body'=>'required',
              'price'=>'required',
              'image'=>'mimes:jpg,png,jpeg,webp|max:5048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ' :attribute  फ़ील्ड रिक्त मान नहीं हो सकता',
            'excerpt.required' =>' :attribute फ़ील्ड रिक्त मान नहीं हो सकता',
            'body.required' =>' :attribute फ़ील्ड रिक्त मान नहीं हो सकता',
            'price.required' =>' :attribute फ़ील्ड रिक्त मान नहीं हो सकता',
        ];
    }
}
