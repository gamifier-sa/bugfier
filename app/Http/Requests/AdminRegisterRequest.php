<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            'name_ar'              => 'required|string',
            'name_en'              => 'required|string',
            'email'                => 'required|email',
            'password'             => 'required|min:8',
//            'password_confirmation' => 'required|min:8|confirmed:password'
        ];
    }
}
