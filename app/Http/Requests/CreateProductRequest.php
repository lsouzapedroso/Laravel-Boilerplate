<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product name is required',
            'description.required' => 'Product description is required',
            'description.string' => 'Product description need a string value',
            'price.required' => 'Product price is required',
            'price.numeric' => 'Product numeric need a number value',
            'stock_quantity.required' => 'Product stock is required',
            'stock_quantity.numeric' => 'Product stock need a number value',
        ];
    }
}
