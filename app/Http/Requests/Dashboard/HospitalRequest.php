<?php

namespace App\Http\Requests\Dashboard;

use App\Models\MainAnalysis;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HospitalRequest extends FormRequest
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
            'name'                   => ['required', 'string', 'max:255'],
            'email'                  => 'required|string|email|max:255|sometimes|unique:employees',
            'phone'                  => ['required','max:255','unique:patients','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'password'               => ['required','string','min:6','max:255','confirmed'],
            'main_analysis'          => ['required','array'],
            'main_analysis.*.id'     => ['required','distinct',Rule::in(MainAnalysis::pluck('id'))],
            'main_analysis.*.price'  => 'required|numeric|min:0',
        ];
    }

    protected function onUpdate(){
        $id = request()->route('id');
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|sometimes|unique:employees' . ',email,' . $id,
            'phone' => ['required'],
            'password' => ['nullable' ,'min:8', 'confirmed'],
            'main_analysis.*.id' => ['required','distinct',Rule::in(MainAnalysis::pluck('id'))],
            'main_analysis.*.price' => 'required|numeric|min:0',
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
