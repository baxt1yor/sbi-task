<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Rules\BarcodeValidationRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name.cyrl' => 'required|string|min:2|max:255',
            'name.ru' => 'required|string|min:2|max:255',
            'name.uz' => 'required|string|min:2|max:255',

            'price' => [
                'required',
                'min_digits:0'
            ],

            'barcode' => [
                'required',
                new BarcodeValidationRule
            ],

            'category_id' => [
                'required',
                Rule::exists(app(Category::class)->getTable(), 'id')
            ]
        ];
    }
}
