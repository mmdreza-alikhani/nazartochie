<?php

namespace Modules\Admin\User\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/UserRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/', 'User');
    }

}
