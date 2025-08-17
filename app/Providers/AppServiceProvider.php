<?php

namespace App\Providers;

use App\Models\Blog;
use App\Policies\BlogPolicy;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        AliasLoader::getInstance()->alias('NotifyHelper', \App\Helpers\NotifyHelper::class);
        AliasLoader::getInstance()->alias('SweetAlertHelper', \App\Helpers\SweetAlertHelper::class);
        AliasLoader::getInstance()->alias('DateHelper', \App\Helpers\DateHelper::class);
        AliasLoader::getInstance()->alias('DataHelper', \App\Helpers\DataHelper::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Blog::class, BlogPolicy::class);   
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Administrator') ? true : null;
        });
    }
}
