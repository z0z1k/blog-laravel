<?php

namespace App\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
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
                $this->makeUniqueRule(),
            ],
            'title' => [
                'required',
                'min:4',
                'max:64',
                $this->makeUniqueRule(),
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

    protected function makeUniqueRule()
    {
        return Rule::unique('tags');
    }
}
