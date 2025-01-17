<?php

namespace Presentation\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Domain\Repositories\UserRepositoryInterface;
use Domain\Services\AuthServiceInterface;
use Infrastructure\Repositories\EloquentUserRepository;
use Infrastructure\Services\LaravelAuthService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(AuthServiceInterface::class, LaravelAuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
