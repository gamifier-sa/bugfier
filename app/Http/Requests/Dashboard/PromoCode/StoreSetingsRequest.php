<?php

namespace App\Http\Requests\Dashboard\PromoCode;

use App\Enums\SubPromoCodeTypes;
use App\Http\Classes\PromoCode\PromoCodeFactory;
use Illuminate\Foundation\Http\FormRequest;

class StoreSetingsRequest extends FormRequest
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
            'user_earning_type' => 'required|string',
            'user_earning' => 'required|string',
            'num_points' => 'required|int',
            'eq_value' => 'required|numeric',
        ];
        if (PromoCodeFactory::getInstance()->isNotVeinLab()) {
            $list['affiliate_earning'] = 'required|numeric';
            $list['affiliate_earning_type'] = 'required|string';
        }
        return $list;
    }
}
