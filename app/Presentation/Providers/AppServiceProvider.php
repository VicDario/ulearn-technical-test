<?php

namespace Presentation\Providers;

use Domain\Mappers\UserMapperInterface;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Domain\Repositories\UserRepositoryInterface;
use Domain\Services\AuthServiceInterface;
use Infrastructure\Mappers\UserMapper;
use Infrastructure\Repositories\EloquentUserRepository;
use Infrastructure\Services\LaravelAuthService;
use Infrastructure\UseCases\LoginUseCase;
use Infrastructure\UseCases\RegisterUserUseCase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(AuthServiceInterface::class, LaravelAuthService::class);
        $this->app->bind(UserMapperInterface::class, UserMapper::class);
        $this->app->bind(LoginUseCase::class, LoginUseCase::class);
        $this->app->bind(RegisterUserUseCase::class, RegisterUserUseCase::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
