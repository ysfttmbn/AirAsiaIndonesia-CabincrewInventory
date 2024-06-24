<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
            'gender' => ['required', 'string'],
            'phone_number' => ['required', 'string', 'max:15'],
            'hub' => ['required', 'string', 'max:3'],
            // Add rules for personal details size
            'female_cabin_shoes' => ['nullable', 'string', 'max:2'],
            'female_ground_shoes' => ['nullable', 'string', 'max:2'],
            'female_red_skirt' => ['nullable', 'string', 'max:2'],
            'female_red_blazer' => ['nullable', 'string', 'max:2'],
            'compression_top' => ['nullable', 'string', 'max:2'],
            'male_black_pants' => ['nullable', 'string', 'max:2'],
            'male_shoes' => ['nullable', 'string', 'max:2'],
            'male_black_blazer' => ['nullable', 'string', 'max:2'],
        ];
    }
}
