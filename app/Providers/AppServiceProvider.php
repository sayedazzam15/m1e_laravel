<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\PersonalAccessToken;
use App\Models\Supervisor;
use App\Models\User;
use App\Transistor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        // Gate::define('musician.show',function(User|Admin|Supervisor $user){
        //     return $user instanceof Admin;
        // });
        // Gate::define('musician.edit',function(User|Admin|Supervisor $user){
        //     return $user instanceof Admin || $user instanceof Supervisor;
        // });
        // Gate::define('musician.delete',function(User|Admin|Supervisor $user){
        //     return $user instanceof Supervisor;
        // });
        // Gate::define('musician.index',function(User|Admin|Supervisor $user){
        //     return $user instanceof Admin;
        // });
    }
}
