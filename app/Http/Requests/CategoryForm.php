<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryForm extends FormRequest
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
            'category_name' => 'required|unique:categories,category_name',
            'category_description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_name.required' => 'insert category name',
            'category_description.required' => 'insert category description'
        ];
    }
}
