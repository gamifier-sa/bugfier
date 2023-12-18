<?php

namespace App\Http\Requests\Dashboard\Result;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'growth_status'                => 'nullable',
            'cultivation'                  => 'required_if:growth_status,growth',
            'high_sensitive_to.*.name'     => 'required_if:growth_status,growth',
            'moderate_sensitive_to.*.name' => 'required_if:growth_status,growth',
            'resistant_to.*.name'          => 'required_if:growth_status,growth',
        ];
    }
}
