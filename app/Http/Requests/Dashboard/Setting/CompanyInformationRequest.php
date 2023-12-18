<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInformationRequest extends FormRequest
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
            'company_name_ar' => 'required|max:255',
            'company_name_en' => 'required|max:255',
            'commercial_number' => 'required|max:255',
            'ceo' => 'required|max:255',
            'hr_manager' => 'required|max:255',
            'country_ar' => 'required|max:255',
            'country_en' => 'required|max:255',
            'city_ar' => 'required|max:255',
            'city_en' => 'required|max:255',
            'address_ar' => 'required|max:255',
            'address_en' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'phone'     => ['required','max:255','regex:/(^00201|01|\+201)(0|1|2|5)([0-9]{8})($)/u'],
            'email' => 'required|max:255|email',
            'logo' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'company_stamp_image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'ceo_signature_image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'header_image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'footer_image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'home_visit_fees' => 'nullable',
            'start_approve_discount_with_point' => 'nullable',
            'number_of_points_equal' => 'nullable',
            'number_of_points' => 'nullable',
        ];
    }
}
