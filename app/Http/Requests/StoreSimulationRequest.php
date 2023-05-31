<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSimulationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tae' => 'required|numeric|gt:0',
            'plazo' => 'required|numeric|gt:0'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'tae.required' => 'El TAE es necesario',
            'tae.numeric' => 'El TAE debe ser un numero',
            'tae.gt' => 'El TAE debe ser mayor que cero',
            'plazo.required' => 'El plazo es necesario',
            'plazo.numeric' => 'El plazo debe ser un numero',
            'plazo.gt' => 'El plazo debe ser mayor que cero',
        ];
    }
}
