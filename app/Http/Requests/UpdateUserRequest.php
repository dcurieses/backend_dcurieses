<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'nombre' => 'required|string',
            'dni' => 'required|string',
            'email' => 'required|email',
            'capital_solicitado' => 'required|numeric|gt:0'
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
            'nombre.required' => 'El nombre es necesario',
            'nombre.string' => 'El nombre debe ser un string',
            'dni.required' => 'El DNI es necesario',
            'dni.string' => 'El DNI debe ser un string',
            'email.string' => 'El email es necesario',
            'email.email' => 'El email es invalido',
            'capital_solicitado.numeric' => 'El capital solicitado debe ser un numero',
            'capital_solicitado.required' => 'El capital solicitado es necesario',
            'capital_solicitado.gt' => 'El capital solicitado debe ser mayor que cero'
        ];
    }
}
