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
            'content'=> 'required|max:256',
            'tags' => 'required|array|min:2',
            'tags.*' => 'exists:tags,id'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'title',
            'content' => 'text',
            'tags' => 'tags list'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Write title please'
        ];
    }
}
