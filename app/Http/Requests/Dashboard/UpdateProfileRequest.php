<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name_ar'     => ['required', 'string', 'max:255'],
            'name_en'     => ['required', 'string', 'max:255'],
            'phone'       => ['nullable','numeric', Rule::unique('admins')->ignore(auth()->id())],
            'email'    => ['required', 'email', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('admins')->ignore(auth()->id())],
            'image'       => ['nullable', 'image'],
        ];
    }
}
