<?php

namespace App\Providers;

use App\Repositories\Interfaces\IAdminRepository;
use App\Services\Classes\AdminService;
use App\Services\Interfaces\IAdminService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
