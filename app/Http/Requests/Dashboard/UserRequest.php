<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return \string[][]
     * Set rules validation on creating
     */
    protected function store(): array
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", 'unique:users'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users'],
            'logo'      => ['nullable', 'mimes:jpeg,png,jpg,gif' . 'svg|max:1024'],
        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns"],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'logo' => ['nullable', 'mimes:jpeg,png,jpg,gif' . 'svg|max:1024'],

        ];
    }

    /**
     * @return \string[][]
     */
    public function rules(): array
    {

        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->update() : $this->store();
    }
}
