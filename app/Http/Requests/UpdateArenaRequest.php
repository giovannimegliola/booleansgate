<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArenaRequest extends FormRequest
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
            Rule::unique('arenas')->ignore($this->arena),
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field ":attribute" is required',
            'name.unique' => 'Field ":attribute" is already chosen',
            'image.required' => 'Field ":attribute" is required',
            'image.image' => 'Field ":attribute" must be an image'
        ];
    }
}
