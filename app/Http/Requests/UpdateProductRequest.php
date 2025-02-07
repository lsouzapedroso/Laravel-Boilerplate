<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'stock_quantity' => 'sometimes|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'description.string' => 'Product description need a string value',
            'price.numeric' => 'Product numeric need a number value',
            'stock_quantity.numeric' => 'Product stock need a number value',
        ];
    }
}
