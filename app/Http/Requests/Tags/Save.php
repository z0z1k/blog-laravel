<?php

namespace App\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Save extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // + ignore on edit
        return [
            'url' => [
                'required',
                'min:4',
                'max:64',
                Rule::unique('tags')
            ],
            'title' => [
                'required',
                'min:4',
                'max:64',
                Rule::unique('tags')
            ],
            'description'=> 'nullable|min:4'
        ];
    }

    public function attributes()
    {
        return [
            'url' => 'url of tag',
            'title' => 'name of tag',
            'description' => 'tag description'
        ];
    }
}
