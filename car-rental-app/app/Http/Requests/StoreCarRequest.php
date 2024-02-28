<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest  extends FormRequest
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
            
            'name' => 'required|max:500',
            'year' => 'required|integer',
            'description' => 'nullable|max:1500',
            'image' => 'nullable|image|mimes:jpg,png',
            'daily-price' => 'required|numeric|min:0'
        ];
    }
}
