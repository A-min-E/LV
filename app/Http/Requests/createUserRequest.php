<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
            "nom" => "required|min:3",
            "email" => "required|email",
            "password" => "required|min:4"
        ];
    }
    public function messages()
    {
        return[
            "nom.required" => "le nom est requis",
            "nom.min" => "le champ nom doit contenir au moin 3 caractères",
            "email.required" => "le email est requis",
            "email.email" => "respectez la forme de l'email",
            "password.required" => "le mot de pass est requis",
            "password.min" => "le mot de pass doit contenir au moin 4 caractères"
        ];
    }
}
