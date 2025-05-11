<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255', Rule::unique('categories', 'title')->ignore($this->id)],
            'subtitle' => ['required', 'string', 'max:255'],
            'img' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                function ($attribute, $value, $fail) {
                    list($width, $height) = getimagesize($value->getPathname());
                    if ($width != 1280 || $height != 540) {
                        $fail('Изображение должно иметь размер 1280x540 пикселей.');
                    }
                },
            ],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            back()->withErrors($validator)->withInput()
        );
    }

    protected function prepareForValidation()
    {
        if (empty($this->subtitle)) {
            $this->merge([
                'subtitle' => $this->title
            ]);
        }
    }
}
