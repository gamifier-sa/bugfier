<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Set ruels validation on stonring
     * @return array
     */
    protected function onCreate(): array
    {

        return [
            "name_ar"   => ['required', 'string', 'max:255', 'unique:roles'],
            "name_en"   => ['required', 'string', 'max:255', 'unique:roles'],
            'abilities' => ['required', 'array', 'min:1'],
        ];
    }

    /**
     * Set ruels validation on updating
     * @return array
     */
    protected function onUpdate(): array
    {

        return [
            "name_ar"      => ['required', 'string', 'max:255'],
            "name_en"      => ['required', 'string', 'max:255'],
            'abilities'    => ['required', 'array', 'min:1'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return request()->isMethod('put') || request()->isMethod('patch') ? $this->onUpdate() : $this->onCreate();
    }
}
