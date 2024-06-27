<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRegistrationRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'is_deleted' => 'false'
    
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'REGISTRATION_NAME_REQUIRE',
            'email.required' => 'REGISTRATION_EMAIL_REQUIRE',
            'email.unique' => 'REGISTRATION_EMAIL_UNIQUE',
            'email.email' => 'REGISTRATION_EMAIL_EMAIL',
            'password.required' => 'REGISTRATION_PASSWORD_REQUIRE',
        ];
    }
}
