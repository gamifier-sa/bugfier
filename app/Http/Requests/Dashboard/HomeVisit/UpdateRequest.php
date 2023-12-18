<?php

namespace App\Http\Requests\Dashboard\HomeVisit;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\GenderType;
use App\Enums\HomeVisitStatus;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_home_visits');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $homeVisit = $this->route('home_visit');
        return [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone'     => ['required','max:255','unique:patients','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email' => 'required|email',
            'patient_id' => 'required',
            'gender' => ['required',new Enum(GenderType::class)],
            'status' => ['nullable',new Enum(HomeVisitStatus::class)],
            'date_time' => 'required'.($homeVisit->date_time != request()->date_time ?'|after_or_equal:now':''),
        ];
    }
}
