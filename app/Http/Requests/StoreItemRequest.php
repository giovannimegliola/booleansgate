<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'image' => 'nullable|image',
            'description' => 'nullable',
            'slug' => 'required|max:200',
            'category' => 'required|max:100',
            'type' => 'required|max:100',
            'weight' => 'required|max:10',
            'cost' => 'required|max:20',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Field ":attribute" is required',
            'name.max' => 'Field ":attribute" must be max :max chars',
            'slug.required' => 'Field ":attribute" is required',
            'slug.max' => 'Field ":attribute" must be max :max chars',
            'category.required' => 'Field ":attribute" is required',
            'category.max' => 'Field ":attribute" must be max :max chars',
            'type.required' => 'Field ":attribute" is required',
            'type.max' => 'Field ":attribute" must be max :max chars',
            'weight.required' => 'Field ":attribute" is required',
            'weight.max' => 'Field ":attribute" must be max :max chars',
            'cost.required' => 'Field ":attribute" is required',
            'cost.max' => 'Field ":attribute" must be max :max chars',
            'image.image' => 'Field ":attribute" must be an image'
        ];
    }
}
