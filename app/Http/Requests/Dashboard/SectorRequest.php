<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SectorRequest extends FormRequest
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
            'logo'       => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'name'       => 'required|max:255|unique:sectors',
            'percentage' => 'required|max:100|numeric',
        ];
    }

    protected function onUpdate(){
        $id = $this->route('sector')->id;
        return [
            'logo'       => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'name'       => 'required|max:255|unique:sectors,id,'.$id,
            'percentage' => 'required|max:100|numeric',
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
