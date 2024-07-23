<?php

namespace Modules\Admin\Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/CategoryRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/', 'Category');
    }

}
