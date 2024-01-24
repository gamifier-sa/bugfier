<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Requests\Auth\AdminAuthRequest;
use App\Http\Services\Auth\AdminAuthService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class AdminAuthController extends Controller
{
    /**
     * @var AdminAuthService
     */
    public AdminAuthService $adminAuthService;

    /**
     * @param AdminAuthService $adminAuthService
     */
    public function __construct(AdminAuthService $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function loginForm()
    {
        return view('dashboard.auth.admin_login');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function registerForm()
    {
        return view('dashboard.auth.admin_register');
    }

    /**
     * @param AdminAuthRequest $request
     * @return void
     */
    public function login(AdminAuthRequest $request)
    {
        $data = $request->validated();
        $this->adminAuthService->login($data);
    }

    /**
     * @param AdminRegisterRequest $request
     * @return void
     */
    public function register(AdminRegisterRequest $request)
    {
        $data = $request->validated();
        $this->adminAuthService->register($data);
    }

    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        $this->adminAuthService->logout();
        return redirect()->route('admin.login');
    }
}
