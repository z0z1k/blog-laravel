<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'title' => 'required|min:10|max:256',
            'content'=> 'required|max:256'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'title',
            'content' => 'text'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Write title please'
        ];
    }
}
