<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Nationality;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
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
            'name_ar'         => 'required|max:255',
            'name_en'         => 'nullable|max:255',
            'id_number'       => 'nullable|integer|unique:patients',
            'phone'           => ['required','max:255','unique:patients','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email'           => 'nullable|email:rfc,dns|unique:patients',
            'gender'          => ['required'],
            'nationality_id'  => ['required','max:255',Rule::in(Nationality::pluck('id'))],
            'age'             => 'required',
            'city'            => 'nullable',
            'address'         => 'nullable',
            'diseases'        => 'nullable',
        ];
    }

    protected function onUpdate(){
        $patient = request()->route('patient');
        return [
            'name_ar'         => 'required|max:255',
            'name_en'         => 'nullable|max:255',
            'id_number'       => 'nullable|integer|unique:patients,id,'.$patient->id,
            'phone'           => ['required','max:255','unique:patients,id,'.$patient->id,'regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email'           => 'nullable|email:rfc,dns|unique:patients,id,'.$patient->id,
            'gender'          => ['required'],
            'nationality_id'  => ['required','max:255',Rule::in(Nationality::pluck('id'))],
            'age'             => 'required',
            'city'            => 'nullable',
            'address'         => 'nullable',
            'diseases'        => 'nullable',
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
