<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'instagram_link' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable', 'string'],
            'bio' => ['nullable', 'string', 'max:500'],
            'profile_img' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
