<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusRequest extends FormRequest
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
            'title_ar'      => 'required|unique:statuses,title_ar|min:3|max:199|string',
            'title_en'      => 'required|unique:statuses,title_en|min:3|max:199|string',
            'is_default'    => 'nullable|boolean',
        ];
    }

    /**
     * @return string[]
     */
    protected function update(): array
    {
        return [
            'title_ar'      => ['nullable','min:3', 'max:199', 'string', Rule::unique('statuses','title_ar')->ignore(request()->segment(3))],
            'title_en'      => ['nullable','min:3', 'max:199', 'string', Rule::unique('statuses','title_en')->ignore(request()->segment(3))],
            'is_default'    => ['nullable','boolean'],
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
