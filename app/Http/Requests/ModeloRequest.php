<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeloRequest extends FormRequest
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
                "nombre" => "required|string|min:1|max:25|unique:modelos,nombre",
                "id_marca" => "required|integer|exist:marcas,id"
            ];
        }

        elseif ($this->method() == "GET"){
            return [
                "id" => "integer|exist:modelos,id"
            ];
        }
        elseif ($this->method() == "PUT" || $this->method() == "DELETE"){
            return [
                "nombre" => "string|min:1|max:25|unique:modelos,nombre",
                "id" => "required|integer|exist:modelos,id"
            ];
        }

        return [];
    }
}
