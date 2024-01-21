<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title_ar'       => 'required|min:3|max:199|string',
            'title_en'       => 'required|min:3|max:199|string',
            'description_en' => 'required|string|min:2',
            'description_ar' => 'required|string|min:2',
            'point'          => 'required|numeric',
            'images'         => 'nullable'
        ];
    }
}
