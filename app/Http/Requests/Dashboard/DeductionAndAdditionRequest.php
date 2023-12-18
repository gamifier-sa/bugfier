<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DeductionAndAdditionRequest extends FormRequest
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
            'name_ar' => 'required|max:255,unique:deduction_and_additions',
            'name_en' => 'required|max:255,unique:deduction_and_additions',
            'type'    => ['required','in:addition,deduction'],
        ];
    }

    protected function onUpdate(){
        $id = $this->route('deduction_and_addition')->id;
        return [
            'name_ar' => 'required|max:255,unique:deduction_and_additions,id,'.$id,
            'name_en' => 'required|max:255,unique:deduction_and_additions,id,'.$id,
            'type'    => ['required','in:addition,deduction'],
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
