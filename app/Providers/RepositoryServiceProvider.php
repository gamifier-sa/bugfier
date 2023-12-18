<?php

namespace App\Providers;

use App\Repositories\Classes\PackageRepository;
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

        // Bind Services
        $this->app->bind(IAdminService::class, AdminService::class);

         // Bind Reposetories
         $this->app->bind(IAdminRepository::class, PackageRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
