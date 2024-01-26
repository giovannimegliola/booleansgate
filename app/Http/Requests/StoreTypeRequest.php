<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'name' => 'required|max:200',
            'image' => 'nullable',
            'desc' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il campo name è obbligatorio',
            'name.max' => 'Il campo name deve avere massimo :max caratteri',
            'desc.required' => 'Il campo desc è obbligatorio'
        ];
    }
}
