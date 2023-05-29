<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            "email" => "required|email",
            "password" => "required|min:4"
        ];
    }
    public function message(){
        return[
            "email.reuierd" => "l'email est requis",
            "email.email" => "respectez la forme de l'email",
            "password.required" => "le password est requis",
            "password.min" => 'le mot de passe doit contien 4 charactère au plus'
        ];

    }
}
