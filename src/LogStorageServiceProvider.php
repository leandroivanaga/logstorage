<?php

namespace Logcomex\LogStorage;

use Illuminate\Support\ServiceProvider;

class LogStorageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
    }

    public function register()
    {
    }
}
