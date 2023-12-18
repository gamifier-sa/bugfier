<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'name' => 'required|max:255|unique:branches',
            'address' => 'required|max:255|unique:branches',
        ];
    }

    protected function onUpdate(){
        $id = $this->route('branch')->id;
        return [
            'name' => 'required|max:255|unique:branches,id,'.$id,
            'address' => 'required|max:255|unique:branches,id,'.$id,
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
