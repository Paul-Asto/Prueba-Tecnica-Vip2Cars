<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
                "nombre" => "string|min:1|max:25|unique:marcas,nombre",
            ];
        }

        elseif ($this->method() == "GET"){
            return [
                "id" => "integer"
            ];
        }
        elseif ($this->method() == "PUT" || $this->method() == "DELETE"){
            return [
                "id" => "required|integer|",
                "nombre" => "required|string|min:1|max:25|unique:marcas,nombre",
            ];
        }

        return [];
    }
}
