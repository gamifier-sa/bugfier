<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{
    /**
     * @param $language
     * @return RedirectResponse
     */
    public function changeLang($language)
    {
        session()->put('theme_lang', $language);

        return redirect()->back();
    }
}
