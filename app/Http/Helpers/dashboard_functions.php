<?php

use App\Http\Classes\AppSetting;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Invoice;

if ( !function_exists('isArabic') ) {

    function isArabic() : bool
    {
        return getLocale() === "ar";
    }

}

if ( !function_exists('isDarkMode') ) {

    function isDarkMode() : bool
    {
        return session('theme_mode') === "dark";
    }

}

if(!function_exists('uploadImage')){

    function uploadImage($request, $model = '' ){
        $model        = Str::plural($model);
        $model        = Str::ucfirst($model);
        $path         = "/Images/".$model;
        $originalName =  $request->getClientOriginalName(); // Get file Original Name
        $imageName    = str_replace(' ','','tempelet_' . time() . $originalName);  // Set Image name
        $request->storeAs($path, $imageName,'public');
        return $imageName;
    }
}


if(!function_exists('deleteImage')){

    function deleteImage($imageName, $model){
        $model = Str::plural($model);
        $model = Str::ucfirst($model);

        if ($imageName != 'default.png'){
            $path = "/Images/" . $model . '/' .$imageName;
            Storage::disk('public')->delete($path);
        }
    }
}

if(!function_exists('getImagePath')){

    function getImagePath( $imageName , $directory = null , $defaultImage = 'boy.svg'  ): string
    {
        $imagePath = public_path('/storage/Images/'.'/' . $directory . '/' . $imageName);

        if ( $imageName && $directory &&  $imagePath ) // check if the directory is null or the image doesn't exist
        {
            return asset('/storage/Images') .'/' . $directory . '/' . $imageName;
        }
        else{
            return asset('storage/Images/' . $defaultImage);
        }

    }

}

if(!function_exists('getImageUserPath')){

    function getImageUserPath( $imageName , $directory = null , $defaultImage = 'boy.svg'  ): string
    {
        $imagePath = public_path('/storage/Images/'.'/' . $directory . '/' . $imageName);

        if ( $imageName && $directory &&  $imagePath ) // check if the directory is null or the image doesn't exist
        {
            return asset('/storage/Images') .'/' . $directory . '/' . $imageName;
        }
        else{
            return asset('storage/Images/' . $defaultImage);
        }

    }

}

if(!function_exists('getImageSettingsPath')){

    function getImageSettingsPath( $imageName , $directory = null , $defaultImage = 'default.jpg'  ): string
    {
        $imagePath = public_path('/storage/Images/'.'/' . $directory . '/' . $imageName);

        if ( $imageName && $directory &&  $imagePath ) // check if the directory is null or the image doesn't exist
        {
            return asset('/storage/Images') .'/' . $directory . '/' . $imageName;
        }
        else{
            return asset('placeholder_images/' . $defaultImage);
        }

    }

}

if(!function_exists('getLocale')){

    function getLocale() : string
    {
        return session('theme_lang') ?? app()->getLocale();
    }
}

if(!function_exists('settings')){

    function settings(): AppSetting
    {
        return new AppSetting();
    }

}


if (!function_exists('prefixHoverShow')) {
    function prefixHoverShow($prefixName): string
    {
        $routeName = explode(".", request()->route()->getName());
        return $routeName[1] == $prefixName ? 'hover show' : '';
    }
}

if (!function_exists('prefixShow')) {
    function prefixShow($prefixName, bool $isFullPath = false) : string
    {
        if($isFullPath) return request()->fullUrlIs($prefixName)? 'show' : '';
      return request()->routeIs($prefixName) ? 'show' : '';
    }
}
