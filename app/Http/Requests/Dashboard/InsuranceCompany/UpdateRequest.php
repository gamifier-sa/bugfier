<?php

namespace App\Http\Requests\Dashboard\InsuranceCompany;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $id = $this->route('insurance_company')->id;
        return [
            'name' => 'required|max:255|unique:insurance_companies,id,'.$id,
            'insurance_company_categories' => 'required|array',
            'insurance_company_categories.*.name' => 'required|max:255',
            'insurance_company_categories.*.percentage' => 'required|max:100|numeric',
        ]; 
    }
}
