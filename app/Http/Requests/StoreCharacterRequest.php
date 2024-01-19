<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCharacterRequest extends FormRequest
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
            'name' => 'required|max:200|unique:characters',
            'description' => 'nullable',
            'attack' => 'required|integer',
            'defence' => 'required|integer',
            'speed' => 'required|integer',
            'life' => 'required|integer',
            'image' => 'nullable|image',
            'type_id' => ['nullable', 'exists:types,id'],
            'items' => ['exists:items,id']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Inserisci il nome',
            'name.max' => 'Il nome può essere lungo al massimo :max caratteri',
            'name.unique' => 'Il nome deve essere unico',
            'attack.required' => 'Inserisci l\'attacco',
            'attack.integer' => 'L\'attacco deve essere un numero intero',
            'defense.required' => 'Inserisci la difesa',
            'defense.integer' => 'La difesa deve essere un numero intero',
            'speed.required' => 'Inserisci la velocità',
            'speed.integer' => 'La velocità deve essere un numero intero',
            'life.required' => 'Inserisci la vita',
            'life.integer' => 'La vita deve essere un numero intero',
            'image.image' => 'Il file non ha un formato valido'
        ];
    }
}
