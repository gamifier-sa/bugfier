<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class MarketerRequest extends FormRequest
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
            'name'               => 'required|string',
            'email'              => 'required|email:rfc,dns|unique:marketers,email',
            'phone'              => 'required','numeric','unique:marketers,phone', 'regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u',
            'country'            => 'required',
            'city'               => 'required',
            'belong_to'          => 'nullable|in:company,person',
            'bank_account_title' => 'nullable',
            'bank_name'          => 'nullable',
            'swift_code'         => 'nullable|numeric',
            'bank_account_no'    => 'nullable',
            'iban'               => 'nullable',
            'bank_branch_code'   => 'nullable|numeric',
        ];
    }
    /**
     * @return string[]
     */
    protected function onUpdate(){
        $id = request()->route('marketer');

        return [
            'name'               => 'required|string',
            'email'              => 'required|email:rfc,dns|unique:marketers,id,'.$id,
            'phone'              => 'required|numeric|regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u|unique:marketers,phone,'.$id,
            'country'            => 'required',
            'city'               => 'required',
            'belong_to'          => 'nullable|in:company,person',
            'bank_account_title' => 'nullable',
            'bank_name'          => 'nullable',
            'swift_code'         => 'nullable|numeric',
            'bank_account_no'    => 'nullable',
            'iban'               => 'nullable',
            'bank_branch_code'   => 'nullable|numeric',
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
