<?php

namespace App\Http\Requests\Dashboard\PromoCode;

use App\Enums\SubPromoCodeTypes;
use App\Http\Classes\PromoCode\PromoCodeFactory;
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
        return /*abilities()->contains('update_doctor')*/ true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = request()->promoCode->id;
        $list = [
            'code' => 'required|min:3|max:255|string|unique:promo_codes,code,'.$id,
            'discount_type' => 'required|string',
            'ranges' => 'required',
            'type' => 'required',
            'sub_type' => 'required|int',
            'main_analysis_id' => 'required_if:sub_type,==,'.SubPromoCodeTypes::ANALYSE->value .'|int|nullable',
            'user_earning' => 'nullable|numeric',
            'user_earning_type' => 'nullable|string',
            'num_points' => 'nullable|int',
            'eq_value' => 'nullable|numeric',
        ];
        $promoCodeFactory = PromoCodeFactory::getInstance();
        if ($promoCodeFactory->isNotVeinLab()) {
            $list['affiliate_earning'] = 'nullable|numeric';
            $list['affiliate_earning_type'] = 'nullable|string';
        }
        if ($promoCodeFactory->isUser()){
            $list['ranges'] = 'nullable';
            $list['discount'] = 'nullable|int';


        }else{
            $list['discount'] = 'required|int';
        }
        return $list;
    }


}
