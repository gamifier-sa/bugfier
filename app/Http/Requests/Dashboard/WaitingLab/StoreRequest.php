<?php

namespace App\Http\Requests\Dashboard\WaitingLab;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use App\Models\{Patient, Hospital, MainAnalysis};
use App\Enums\GrowthStatus;

class StoreRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_id'=>['required',Rule::in(Patient::pluck('id'))],
            //'invoice_id'=>['required',Rule::in(Nationality::pluck('id'))],
            'hospital_id'=>['required',Rule::in(Hospital::pluck('id'))],
            'main_analysis_id'=>['required',Rule::in(MainAnalysis::pluck('id'))],
            'cultivation'=>'string',
            'growth_status'=>['string',new Enum(GrowthStatus::class)],
            'high_sensitive_to'=>'string',
            'moderate_sensitive_to'=>'string',
            'resistant_to'=>'string',
            'result'=>['integer'],
            'status'=>['integer'],
            'report'=>['string'],
        ];
    }
}
