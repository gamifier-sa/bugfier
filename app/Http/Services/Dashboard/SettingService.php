<?php

namespace App\Http\Services\Dashboard;

use Illuminate\Http\Request;

class SettingService
{
    /**
     * @param $request
     * @param $data
     */
    public function modify($request, $data){
        $this->validateFiles('logo','general',$request,$data);
        $this->validateFiles('company_stamp_image','general',$request,$data);
        $this->validateFiles('ceo_signature_image','general',$request,$data);
        $this->validateFiles('header_image','general',$request,$data);
        $this->validateFiles('footer_image','general',$request,$data);
        $this->validateFiles('favicon','general',$request,$data);
        $this->validateFiles('favicon','general',$request,$data);

        foreach ($data as $key => $value)
        {
            settings()->set($key, $value);
        }
    }

    /**
     * @param         $keyName
     * @param         $sectionName
     * @param Request $request
     * @param         $data
     */
    private function validateFiles($keyName , $sectionName , Request $request , &$data)
    {
        if(! settings()->get($keyName))
        {
            $request->validate([
                $keyName   => [ 'bail' , 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:5120',  'nullable' ],
            ]);
        }

        if($request->hasFile($keyName))
        {
            $request->validate([
                $keyName   => [ 'nullable' , 'bail' ,'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:5120' ]
            ]);
            deleteImage(settings()->get('logo') , "Settings");
            $data[$keyName] = uploadImage($request->file($keyName) , "Settings");
        }

    }
}
