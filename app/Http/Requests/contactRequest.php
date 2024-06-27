<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactRequest extends FormRequest
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
     *@return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'user_id' => 'required',
            'creator_email' => 'required',
            'name' => 'required',
            'email' => 'required',
            'company' => 'required',
            'phone' => 'required',
            'is_deleted' => 'false'
    
        ];
    }

    public function messages()
    {
        return [
            //'user_id.required' => 'CREATE_USER_ID_REQUIRE',
            'creator_email.required' => 'CREATE_EMAIL_REQUIRE',
            'name.required' => 'CREATE_NAME_REQUIRE',
            'email.required' => 'CREATE_EMAIL_REQUIRE',
            'company.required' => 'CREATE_NAME_REQUIRE',
            'phone.required' => 'CREATE_EMAIL_REQUIRE',
        ];
    }



}
