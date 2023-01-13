<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'avatar'=>'file|image|mimes:jpeg,jpg,png,bmp|max:10240'
        ];
    }
    public function messages()
    {
        return[
            'avatar.mimes'=>'Image must be jpeg, jpg, png, bmp',
            'avatar.image'=>'File must be image',
            'avatar.max'=>'File must be maximum 10240 bytes',
        ];
    }
}
