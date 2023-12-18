<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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

    /**
     * @return array
     */
    protected function onCreate(){
        return [
            'name'       => 'required|min:4|max:255|string',
            'signature'  => 'nullable|image',
            'phone'      => ['required','max:255','unique:doctors','regex:/(^(00201|01|\+201)(1|2|0|5)([0-9]{8})$)/u'],
            'email'      => 'required|email|unique:doctors',
            'percentage' => 'required|int',
        ];
    }

    /**
     * @return array
     */
    protected function onUpdate(){
        $doctor = request()->route('doctor');
        return [
            'name'        => 'required|min:4|max:255|string',
            'signature'   => 'nullable|image',
            'percentage'  => 'required|int',
            'phone'       => ['required','max:255','unique:doctors,id,'.$doctor->id,'regex:/(^(00201|01|\+201)(1|2|0|5)([0-9]{8})$)/u'],
            'email'       => 'nullable|email:rfc,dns|unique:doctors,id,'.$doctor->id,
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
