<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
        if ($this->method() == "POST"){
            return [
                "placa" => ["regex:/^[A-Z]{3}-\d{3,4}$/", "required"],
                "año_fabricacion" => "required|integer|min:1900|max:" . date('Y'),
                "id_modelo" => "required|integer|exists:modelos,id",
                "id_propietario" => "required|uuid|exists:propietarios,id",
            ];
        }
        
        elseif ($this->method() == "GET"){
            return [
                "id" => "uuid|exist:vehiculos,id"
            ];
        }
        elseif ($this->method() == "PUT" || $this->method() == "DELETE"){
            return [
                "id" => "required|uuid|exists:vehiculos,id",
                "placa" => ["regex:/^[A-Z]{3}-\d{3,4}$/"],
                "año_fabricacion" => "integer|min:1900|max:" . date('Y'),
                "id_modelo" => "integer|exists:modelos,id",
                "id_propietario" => "uuid|exists:propietarios,id",
            ];
        }
        
        return [];
    }
}
