<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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

    protected function onCreate(){
        return [
            'name_ar'   => ['required', 'string', 'max:255','min:3'],
            'name_en'   => ['nullable', 'string', 'max:255','min:3'],
            'phone'     => ['required','max:255','unique:employees','regex:/(^(00201|01|\+201)(1|2|0|5)([0-9]{8})$)/u'],
            'password'  => ['required','string','min:8','max:255','confirmed'],
            'email'      => 'required|email|unique:employees',
//            'password_confirmation' => ['required','same:password'],
           // 'email'     => ['required','string', "email:rfc,dns",'unique:employees'],
            'roles'     => ['required','array','min:1'],
            'branch_id'     => 'required',
        ];
    }

    protected function onUpdate(){
        $id = $this->route('employee')->id;
        return [
            'name_ar'  => ['required', 'string', 'max:255','min:3'],
            'name_en'  => ['nullable', 'string', 'max:255','min:3'],
            'phone'    => ['required','max:255','regex:/(^(00201|01|\+201)(1|2|0|5)([0-9]{8})$)/u'],
            'password' => ['nullable','exclude_if:password,null','string','min:8','max:255','confirmed'],
//            'password_confirmation' => ['nullable','exclude_if:password_confirmation,null','same:password'],
            //'email'    => ['required','string', "email:rfc,dns",'unique:employees,id,' . $id ],
            'email'      => 'required|email|unique:employees,id,'.$id,
            'roles'    => ['required','array','min:1'],
            'branch_id'     => 'required',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->onUpdate() : $this->onCreate();
    }
}
