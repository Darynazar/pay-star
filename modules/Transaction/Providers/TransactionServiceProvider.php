<?php

namespace Transaction\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Transaction\Database\Seeds\UserCreditCardSeeder;

class TransactionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        DatabaseSeeder::$seeders[3] = UserCreditCardSeeder::class;
    }
}
