<?php

namespace KC\Providers;

use Illuminate\Support\ServiceProvider;
use KC\Models\User\UserRepository;
use KC\Models\User\UserRepositoryInterface;
use KC\Services\UserServices\UserFetcher;
use KC\Services\UserServices\UserDestroyer;
use KC\Services\UserServices\UserCreator;
use KC\Services\UserServices\UserUpdater;
use KC\Services\DeviceServices\DeviceFetcher;
use KC\Models\User\User;
use Spatie\Fractal\Fractal;
use KC\Transformers\UserTransformer;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $model = new User();
        $repository = new UserRepository($model);
        $this->app->instance(UserRepository::class, $repository);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
