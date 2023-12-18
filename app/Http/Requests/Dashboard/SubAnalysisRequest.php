<?php

namespace App\Http\Requests\Dashboard;

use App\Models\MainAnalysis;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubAnalysisRequest extends FormRequest
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
            'main_analysis_id' => ['required',Rule::in(MainAnalysis::pluck('id'))],
            'name'             => 'required',
            'classification'   => 'nullable',
            'unit'             => 'nullable',
        ];
    }

    protected function onUpdate(){
        return [
            'main_analysis_id' => ['required',Rule::in(MainAnalysis::pluck('id'))],
            'name'             => 'required',
            'classification'   => 'nullable',
            'unit'             => 'nullable',
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
