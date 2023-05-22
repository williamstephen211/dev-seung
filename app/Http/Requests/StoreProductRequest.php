<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:63',
            'content' => 'required|max:255',
            'call' => 'required|regex:/(\d{2,3})-(\d{3,4})-(\d{4})/' 
        ];
    }

    public function messages(){
        return [
            'name.required' => 'No Title',
            'name.max' => 'Title is less 63 charactor',
            'content.required' => 'No Content',
            'content.max' => 'Content is less 255 charactor',
            'call.required' => 'Empty phone number.',
            'call.regex' => 'Long Phone Number.',
        ];
    }
}
