<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropietarioRequest extends FormRequest
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
                "nombre" => "required|string|min:1|max:25",
                "apellidos" => "required|string|min:1|max:25",
                "dni" => "required|string|min:8|max:8",
                "correo" => "email:rfc,dns",
                "telefono" =>"string|alpha_num|min:9|max:20",
            ];
        }

        elseif ($this->method() == "GET"){
            return [
                "id" => "uuid|exist:propietarios,id",
            ];
        }
        elseif ($this->method() == "PUT" || $this->method() == "DELETE"){
            return [
                "id" => "required|uuid|exist:propietarios,id",
                "nombre" => "string|min:1|max:25",
                "apellidos" => "string|min:1|max:25",
                "dni" => "string|min:8|max:8",
                "correo" => "email:rfc,dns",
                "telefono" =>"string|alpha_num|min:9|max:20",
            ];
        }

        return [];
    }

}
