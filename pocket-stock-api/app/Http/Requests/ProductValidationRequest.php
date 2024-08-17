<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|unique:products,name',
            'quantity' => 'nullable|integer|min:0',
            'description' => 'nullable|regex:/(^[A-Za-z0-9 ]+$)+/',
        ];
    }
}
