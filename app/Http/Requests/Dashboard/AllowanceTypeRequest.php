<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AllowanceTypeRequest extends FormRequest
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
            'name'       => 'required|unique:allowance_types',
            'amount'     => 'required|numeric|min:1',
            'type'       => ['required','in:addition,deduction'],
            'percentage' => 'required|numeric|min:0|max:100',
        ];
    }


    protected function onUpdate(){
        $id = $this->route('allowance_type')->id;
        return [
            'name'       => 'required|unique:allowance_types,id,'.$id,
            'amount'     => 'required|numeric|min:1',
            'type'       => ['required','in:addition,deduction'],
            'percentage' => 'required|numeric|min:0|max:100',
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
