<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

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

    protected function onCreate() : array
    {
        return [
            'name_ar'   => ['required', 'string', 'max:255','min:3'],
            'name_en'   => ['nullable', 'string', 'max:255','min:3'],
            'phone'     => ['required','max:255','unique:admins'],
            'password'  => ['required','string','min:8','max:255','confirmed'],
            'email'     => 'required|email|unique:admins',
            'roles'     => ['required','array','min:1'],

        ];
    }

    protected function onUpdate() : array
    {

        return [
            'name_ar'  => ['required', 'string', 'max:255','min:3'],
            'name_en'  => ['nullable', 'string', 'max:255','min:3'],
            'phone'    => ['required','max:255','regex:/(^(00201|01|\+201)(1|2|0|5)([0-9]{8})$)/u'],
            'password' => ['nullable','exclude_if:password,null','string','min:8','max:255','confirmed'],
            'email'    => 'required|email|unique:admins',
            'roles'    => ['required','array','min:1'],
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
