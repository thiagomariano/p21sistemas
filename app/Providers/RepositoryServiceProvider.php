<?php

namespace AllBlacks\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\AllBlacks\Repositories\UserRepository::class, \AllBlacks\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\AllBlacks\Repositories\ClientRepository::class, \AllBlacks\Repositories\ClientRepositoryEloquent::class);
        //:end-bindings:
    }
}
