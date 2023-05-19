<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormRequest extends FormRequest
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
            // 'nom' => 'required|min:4',
            // "email" => "required|email",
            "titre" => 'required|min:4',
            "description" => "required|min:5"
        ];
    }
    public function messages()
    {
        return[
            //nom espace
            // "nom.required" => "le nom et requis",
            // "nom.min" => "le nom doit contien au minimimum 4 caractères",
            //email espace
            // "email.required" => 'le email et resquis',
            // "email.email" => "le email doit etre correct",
            //titre espace
            "titre.required" => "le titre est requis",
            "titre.min" => 'le titre doit comport au moin 4 caractères',
            "decription.required" => "la description est requis",
            "decription.min" => 'la description doit comport au minimum 5 caractères'
        ];
    }
}
