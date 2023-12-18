<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class NationalityRequest extends FormRequest
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
            'logo'    => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'name_ar' => 'required|max:255|unique:nationalities',
            'name_en' => 'required|max:255|unique:nationalities',
        ];
    }

    protected function onUpdate(){
        $id = $this->route('nationality')->id;
        return [
            'logo'    => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'name_ar' => 'required|max:255|unique:nationalities,id,'.$id,
            'name_en' => 'required|max:255|unique:nationalities,id,'.$id,
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
