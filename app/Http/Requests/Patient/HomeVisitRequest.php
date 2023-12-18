<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\GenderType;

class HomeVisitRequest extends FormRequest
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
     * @return array             //^$
     */
    public function rules()
    {
        return [
            'name'         => 'required|max:255',
            'address'      => 'required|max:255',
            'phone'        => ['required','max:255','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email'        => 'required|email',
            'gender'       => ['required',new Enum(GenderType::class)],
            'date_time'    => 'required|after_or_equal:now',
            'analyse_name' => 'nullable|min:3|max:255|string',
            'photo'        => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'date_time.after_or_equal' => '(الوقت والتاريخ) يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ اليوم',
        ];
    }
}
