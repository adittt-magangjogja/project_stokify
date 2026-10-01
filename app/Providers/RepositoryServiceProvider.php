<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\StockOpnameRepositoryInterface;
use App\Repositories\Contracts\StockTransactionRepositoryInterface;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use App\Repositories\Contracts\ProductAttributeRepositoryInterface;
use App\Repositories\Contracts\SettingsRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\ReportRepositoryInterface;
use App\Repositories\Contracts\DashboardRepositoryInterface;
use App\Repositories\Contracts\ActivityLogRepositoryInterface;

use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\StockOpnameRepository;
use App\Repositories\Eloquent\StockTransactionRepository;
use App\Repositories\Eloquent\SupplierRepository;
use App\Repositories\Eloquent\ProductAttributeRepository;
use App\Repositories\Eloquent\SettingsRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\ReportRepository;
use App\Repositories\Eloquent\DashboardRepository;
use App\Repositories\Eloquent\ActivityLogRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            StockOpnameRepositoryInterface::class,
            StockOpnameRepository::class
        );

        $this->app->bind(
            StockTransactionRepositoryInterface::class,
            StockTransactionRepository::class
        );

        $this->app->bind(
            SupplierRepositoryInterface::class,
            SupplierRepository::class
        );

        $this->app->bind(ProductAttributeRepositoryInterface::class, ProductAttributeRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
        $this->app->bind(DashboardRepositoryInterface::class, DashboardRepository::class);
        $this->app->bind(ActivityLogRepositoryInterface::class, ActivityLogRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
