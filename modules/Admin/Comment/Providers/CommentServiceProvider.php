<?php

namespace Modules\Admin\Comment\Providers;

use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/CommentRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/', 'Category');
    }

}
