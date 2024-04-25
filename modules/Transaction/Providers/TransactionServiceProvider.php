<?php

namespace Transaction\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;


class TransactionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}
