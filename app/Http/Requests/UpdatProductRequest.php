<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'between:0.00,99999999.99'],
            'unit' => ['nullable', 'string'],
            'product_code' => ['nullable', 'string'],
            'description' => ['nullable', 'string', 'regex:/^[\s\S]*(<p>|<br\s*\/?>|<ul>|<li>)*[\s\S]*$/i'],
            'category_id' => ['nullable', 'numeric'],
            'size_id' => ['nullable', 'numeric'],
            'color_id' => ['nullable', 'numeric'],
            'pattern_id' => ['nullable', 'numeric'],
            'texture_id' => ['nullable', 'numeric'],
            'brand_id' => ['nullable', 'numeric'],
            'collection_id' => ['nullable', 'numeric'],
            'country_id' => ['nullable', 'numeric'],
            'imgs' => ['nullable', 'array'],
            'imgs.*' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'dimensions:max_width=1200,max_height=1200',
                'max:50000',
            ],
            'image_order.*' => 'integer|min:0|max:4',
        ];
    }
}
