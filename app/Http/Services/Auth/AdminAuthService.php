<?php

namespace App\Http\Services\Auth;

use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use App\Models\Admin;

class AdminAuthService {

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function login($request) : RedirectResponse
    {
        $admin = Admin::whereEmail($request['email'])->first();
        if ($admin) {
            if(Hash::check($request['password'], $admin['password']))
            {
                Auth::guard('admin')
                    ->login($admin, isset($request['remember']) && $request['remember'] == 1);
                return redirect()->intended('/dashboard');
            } else {
                throw ValidationException::withMessages([
                    "password" => __("The password is incorrect"),
                ]);
            }

        } else {
            throw ValidationException::withMessages([
                "password" => __("The password is incorrect"),
                "email"    => __("This email doesn't exist"),
            ]);
        }
    }


    public function logout() : void
    {
        Auth::guard('admin')->logout();
    }
}
