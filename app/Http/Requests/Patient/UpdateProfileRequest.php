<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'     => ['required', 'string', 'max:255'],
            'name_en'     => ['required', 'string', 'max:255'],
            'phone'    => ['required','string','max:255','unique:employees,id,' . auth()->id()],
            'email'    => ['required','string', "email:rfc,dns",'unique:employees,id,' . auth()->id() ],
        ];
    }
}
