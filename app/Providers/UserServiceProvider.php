<?php

namespace KC\Providers;

use Illuminate\Support\ServiceProvider;
use KC\Models\User\UserRepository;
use KC\Models\User\UserRepositoryInterface;
use KC\Services\UserServices\UserFetcher;
use KC\Services\UserServices\UserDestroyer;
use KC\Services\UserServices\UserCreator;
use KC\Services\UserServices\UserUpdater;
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
        $transformer = new UserTransformer;

        $this->app->instance(UserTransformer::class, $transformer);
        $this->app->instance(UserRepository::class, $repository);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(UserCreator::class, function ($app) use ($repository){
            return new UserCreator($repository);
        });
        $this->app->singleton(UserUpdater::class, function () use ($repository) {
            return new UserUpdater($repository);
        });
        $this->app->singleton(UserDestroyer::class, function ($app) use ($repository) {
            return new UserDestroyer($repository);
        });
        $this->app->singleton(UserFetcher::class, function ($app) use ($repository, $transformer) {
            return new UserFetcher($repository, $transformer, $app->make(Fractal::class));
        });
    }
}
