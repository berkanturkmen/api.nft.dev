<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(\App\Repositories\BaseInterface::class, \App\Repositories\BaseRepository::class);
        $this->app->bind(\App\Repositories\User\UserInterface::class, \App\Repositories\User\UserRepository::class);
    }
}
