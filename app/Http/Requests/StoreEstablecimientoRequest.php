<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEstablecimientoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:4|max:250',
            'descripcion' => 'required|string|min:10',
            'direccion' => 'required|string|min:5|max:250',
            'archivo_imagen' => 'sometimes|image|mimes:jpg,jpeg,png,avif,webp|max:2048',
            'telefono' => 'required|string|min:6|max:20',
            'email' => 'nullable|email|max:250',
            'website' => 'nullable|url|max:250',
            'horario_apertura' => 'required|date_format:H:i',
            'horario_cierre' => 'required|date_format:H:i|after:horario_apertura',
            'latitud' => 'required|numeric',
            'longitud'  => 'required|numeric',
            'estado' => 'required|in:ACTIVO,INACTIVO',
            'categoria_id' => 'required|exists:categoria,id',
        ];
    }
}
