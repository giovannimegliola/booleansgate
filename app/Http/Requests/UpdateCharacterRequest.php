<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
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
            'description' => 'nullable|min:50',
            'attack' => 'required|integer',
            'defence' => 'required|integer',
            'speed' => 'required|integer',
            'life' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Inserisci il nome',
            'name.max' => 'Il nome può essere lungo al massimo :max caratteri',
            'name.unique' => 'Il nome deve essere unico',
            'description.min' => 'La descrizione deve avere almeno :min caratteri',
            'attack.required' => 'Inserisci l\'attacco',
            'attack.integer' => 'L\'attacco deve essere un numero intero',
            'defense.required' => 'Inserisci la difesa',
            'defense.integer' => 'La difesa deve essere un numero intero',
            'speed.required' => 'Inserisci la velocità',
            'speed.integer' => 'La velocità deve essere un numero intero',
            'life.required' => 'Inserisci la vita',
            'life.integer' => 'La vita deve essere un numero intero',

        ];
    }
}
