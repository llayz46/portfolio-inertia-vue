<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string', 'min:20', 'max:500'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
            'slug' => ['required', 'string', 'unique:projects'],
            'url' => ['required', 'url'],
            'github' => ['nullable', 'url'],
            'year' => ['required', 'integer', 'min:2000', 'max:' . date('Y')],
            'technologies' => ['required', 'array']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
