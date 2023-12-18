<?php

namespace App\Http\Requests\Dashboard\Invoice;

use App\Enums\{InvoiceTransfer, PaymentMethod};
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return /*abilities()->contains('create_doctor')*/ true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "patient_id"    => 'required',
            "amount_paid"   => 'required_unless:pay_method,' . PaymentMethod::OVERDUE->getValue(),
            "transfer"      => 'required',
            "pay_method"    => 'required',
            "payment_type"  => 'required_unless:pay_method,' . PaymentMethod::CREDIT->getValue(),
            "discount"      => 'nullable|numeric|min:0',
            "promo_code_id" => 'required_if:has_promo_code,"true"',
            "hospital_id"   => 'required_if:transfer,' . (InvoiceTransfer::HOSPITAL->value.''),
            "sector_id"     => 'required_if:transfer,' . (InvoiceTransfer::SECTOR->value.''),
            "doctor_id"     => 'required_if:transfer,' . (InvoiceTransfer::DOCTOR->value.''),
            "data_table"    => 'required|array',
            "tax"           => 'required',
            "total_price"   => 'required',
            "total_cost"    => 'required',
            "has_promo_code"    => 'required',
            "user_points_used"    => 'nullable',
            "is_home_fees"    => 'required',
            "invoice_is_free"    => 'nullable',
            "laboratory_id"    => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'hospital_id.required_if'=>  __('Choose the hospital'),
            'sector_id.required_if'=>  __('Choose the sector'),
            'doctor_id.required_if'=>  __('Choose the doctor'),

        ];
    }


}
