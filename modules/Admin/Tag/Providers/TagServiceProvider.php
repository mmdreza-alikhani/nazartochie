<?php

namespace Modules\Admin\Tag\Providers;

use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/TagRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/', 'Tag');
    }

}
