<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class ShowProductRequest extends FormRequest
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
            'id' => 'required|integer|exists:products,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Product ID is required.',
            'id.integer' => 'Product ID must be an integer.',
            'id.exists' => 'Product ID does not exist.',
            ];
    }
}
