<?php

namespace App\Http\Requests\Dashboard;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BugRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function store(): array
    {
        return [
            'title'       => 'required|min:3|max:199|string',
            'description' => 'required|string|min:2',
            'point'       => 'required',
            'project_id'  => 'required|numeric|exists:projects,id',
            'responsible_admin'  => 'nullable|numeric|exists:admins,id',
            'images'      => ['nullable'],
            'status'      => ['nullable', Rule::in(Status::values())],
        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {
        return [
            'title'       => 'required|min:3|max:199|string',
            'description' => 'required|string|min:2',
            'point'       => 'required',
            'project_id'  => 'required|numeric|exists:projects,id',
            'responsible_admin'  => 'nullable|numeric|exists:admins,id',
            'images'      => ['nullable', 'mimes:jpeg,png,jpg,gif' . 'svg|max:1024'],
            'status'      => ['nullable', Rule::in(Status::values())],
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
