<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'descriptions' => 'required',
            'price' => [
                'required',
                'numeric'
            ],
            'sale' => [
                'nullable',
                'numeric'
            ],
            'image' => [
                'nullable',
                'image',
            ],
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
            ]
        ];
    }
}
