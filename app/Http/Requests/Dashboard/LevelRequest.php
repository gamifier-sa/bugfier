<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LevelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    protected function store(): array
    {
        return [
            'name_ar'      => 'required|unique:levels,name_ar|min:3|max:199|string',
            'name_en'      => 'required|unique:levels,name_en|min:3|max:199|string',
            'exp'          => 'required|numeric'
        ];
    }

    /**
     * @return string[]
     */
    protected function update(): array
    {
        return [
            'name_ar'      => ['nullable','min:3', 'max:199', 'string', Rule::unique('levels','name_ar')->ignore(request()->segment(3))],
            'name_en'      => ['nullable','min:3', 'max:199', 'string', Rule::unique('levels','name_en')->ignore(request()->segment(3))],
            'exp'          => 'required|numeric'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->update() : $this->store();
    }
}
