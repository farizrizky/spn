<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        AliasLoader::getInstance()->alias('NotifyHelper', \App\Helpers\NotifyHelper::class);
        AliasLoader::getInstance()->alias('DateHelper', \App\Helpers\DateHelper::class);
        AliasLoader::getInstance()->alias('DataHelper', \App\Helpers\DataHelper::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
