<?php

namespace App\Http\Requests\Dashboard\PromoCode;

use App\Enums\SubPromoCodeTypes;
use App\Http\Classes\PromoCode\PromoCodeFactory;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\{BloodType, GenderType};

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
        $list = [
            'code'             => 'required|min:4|max:255|string|unique:promo_codes,code',
            'discount_type'    => 'required|string',
            'discount'         => 'required|int',
            'ranges'           => 'required',
            'type'             => 'required',
            'sub_type'         => 'required|int',
            'main_analysis_id' => 'required_if:sub_type,==,'.SubPromoCodeTypes::ANALYSE->value .'|int|nullable'
        ];
        if (PromoCodeFactory::getInstance()->isMarketer()) {
            $list['marketer_id'] = 'required|numeric';
            $list['affiliate_earning'] = 'nullable|numeric';
            $list['affiliate_earning_type'] = 'nullable|string';
        }
        return $list;
    }
}
