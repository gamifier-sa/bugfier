<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
     * @return array
     */
    protected function onCreate() : array
    {
        return [
            'name_ar'             => ['required', 'string', 'max:255','min:3'],
            'name_en'             => ['nullable', 'string', 'max:255','min:3'],
            'phone'               => ['nullable','unique:admins','numeric'],
            'password'            => ['required','string','min:8','max:255','confirmed'],
            'email'               => 'required|email|unique:admins',
            'level_id'            => 'nullable',
            'status'              => 'required|in:active,pending,block',
            'daily_attendance'    => 'nullable|in:0,1',
            'roles'               => ['required','array','min:1'],

        ];
    }

    /**
     * @return array
     */
    protected function onUpdate() : array
    {
        return [
            'name_ar'             => ['required', 'string', 'max:255','min:3'],
            'name_en'             => ['nullable', 'string', 'max:255','min:3'],
            'phone'               => ['nullable','numeric', Rule::unique('admins')->ignore(request()->segment(3))],
            'password'            => ['nullable','exclude_if:password,null','string','min:8','max:255','confirmed'],
            'email'               => ['required', 'email', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('admins')->ignore(request()->segment(3))],
            'level_id'            => 'required',
            'roles'               => ['required','array','min:1'],
            'daily_attendance'    => 'nullable|in:0,1',
            'status'              => 'nullable|in:active,pending,block',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->onUpdate() : $this->onCreate();
    }
}
