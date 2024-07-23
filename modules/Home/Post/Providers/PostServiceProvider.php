<?php

namespace Modules\Home\Post\Providers;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/PostRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/', 'Post');
    }

}
