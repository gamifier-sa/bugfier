<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

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

    protected function onCreate(){
        return [
            'name'      => 'required|max:255',
            'address'   => 'required|max:255',                          
            'phone'     => ['required','max:255','unique:patients','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email'     => 'required|email',
            'gender'    => ['required'],
            'date_time' => 'required|after_or_equal:now',
        ];
    }

    protected function onUpdate(){
        $homeVisit = $this->route('home_visit');
        return [
            'name'      => 'required|max:255',
            'address'   => 'required|max:255',
            'phone'     => ['required','max:255','unique:patients','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email'     => 'required|email',
            'gender'    => ['required'],
            'date_time' => 'required'.($homeVisit->date_time != request()->date_time ?'|after_or_equal:now':''),
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
