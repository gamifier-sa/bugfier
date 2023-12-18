<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class MainAnalysisRequest extends FormRequest
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
            'general_name'                           => 'required|max:255|unique:main_analysis',
            'abbreviated_name'                       => 'required|max:255',
            'code'                                   => 'required|max:255|unique:main_analysis,code',
            'discount'                               => 'nullable|numeric',
            'cost'                                   => 'required|numeric',
            'price'                                  => 'required|numeric',
            'sub_analysis'                           => 'nullable|array',
            'sub_analysis.*.name'                    => 'required',
            'sub_analysis.*.classification'          => 'nullable',
            'sub_analysis.*.unit'                    => 'nullable',
            'sub_analysis.*.normal_range'            => 'required|array',
            'sub_analysis.*.normal_range.*.from'     => 'required',
            'sub_analysis.*.normal_range.*.to'       => 'required',
            'sub_analysis.*.normal_range.*.gender'   => 'required',
            'sub_analysis.*.normal_range.*.type'     => 'required',
            'sub_analysis.*.normal_range.*.value'    => 'required',
        ];
    }

    protected function onUpdate(){
        return [
            'general_name'                           => 'required|max:255|unique:main_analysis,id,'.$this->route('id'),
            'abbreviated_name'                       => 'required|max:255',
            'code'                                   => 'required|max:255|unique:main_analysis,code,'.$this->route('id'),
            'discount'                               => 'nullable|numeric',
            'cost'                                   => 'required|numeric',
            'price'                                  => 'required|numeric',
            'sub_analysis'                           => 'nullable|array', //distinct
            'sub_analysis.*.name'                    => 'required|distinct',
            'sub_analysis.*.classification'          => 'nullable',
            'sub_analysis.*.unit'                    => 'nullable',
            'sub_analysis.*.normal_range'            => 'required|array',
            'sub_analysis.*.normal_range.*.id'       => 'nullable',
            'sub_analysis.*.normal_range.*.from'     => 'required',
            'sub_analysis.*.normal_range.*.to'       => 'required',
            'sub_analysis.*.normal_range.*.gender'   => 'required',
            'sub_analysis.*.normal_range.*.type'     => 'required',
            'sub_analysis.*.normal_range.*.value'    => 'required',
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
