<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        'product_name' => 'required|string|max:255',
        'size' => 'required|string|max:50',
        'quantity' => 'required|integer|min:1',
        'category' => 'required|string|max:100',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh aturan untuk gambar
    ];
}
}
