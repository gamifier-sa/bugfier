<?php

namespace App\Http\Requests\Dashboard;

use App\Models\MainAnalysis;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LaboratoryRequest extends FormRequest
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
            'name'                           => 'required|min:4|max:255|string',
            'phone'                          => ['required','max:255','unique:laboratories','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email'                          => 'required|email:rfc,dns|unique:laboratories',
            'address'                        => 'nullable|string',
            'main_analysis'                  => ['nullable','array'],
            'main_analysis.*.id'             => ['required','distinct',Rule::in(MainAnalysis::pluck('id'))],
            'main_analysis.*.selling_price'  => 'required|numeric|min:0',
            'main_analysis.*.cost_price'     => 'required|numeric|min:0',
        ];
    }

    /**
     * @return array
     */
    protected function onUpdate(){
        return [
            'name'                           => 'required|min:4|max:255|string',
            'phone'                          => ['required','max:255','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email'                          => 'nullable|email:rfc,dns',
            'address'                        => 'nullable|string',
            'main_analysis'                  => ['nullable','array'],
            'main_analysis.*.id'             => ['required','distinct',Rule::in(MainAnalysis::pluck('id'))],
            'main_analysis.*.selling_price'  => 'required|numeric|min:0',
            'main_analysis.*.cost_price'     => 'required|numeric|min:0',
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
