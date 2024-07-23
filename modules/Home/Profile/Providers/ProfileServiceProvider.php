<?php

namespace Modules\Home\Profile\Providers;

use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/ProfileRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/', 'Profile');
    }

}
