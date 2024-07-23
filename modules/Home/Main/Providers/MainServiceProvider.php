<?php

namespace Modules\Home\Main\Providers;

use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/MainRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/', 'HomeMain');
    }

}
