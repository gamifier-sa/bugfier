<?php

namespace App\Http\Requests\Dashboard;

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
            'title'      => 'required|unique:statuses,title|min:3|max:199|string',
            'is_default' => 'nullable|boolean',
        ];
    }

    /**
     * @return string[]
     */
    protected function update(): array
    {
        return [
            'title'      => ['nullable','min:3', 'max:199', 'string', Rule::unique('statuses','title')->ignore(request()->segment(3))],
            'is_default' => ['nullable','boolean'],
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->update() : $this->store();
    }
}
