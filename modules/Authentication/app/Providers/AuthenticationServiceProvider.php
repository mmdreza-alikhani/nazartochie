<?php

namespace Modules\Authentication\app\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Authentication\app\View\Components\AppLayout;
use Modules\Authentication\app\View\Components\GuestLayout;

class AuthenticationServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../Routes/AuthenticationRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/', 'Auth');
        $this->loadViewComponentsAs('Auth', [
            GuestLayout::class,
            AppLayout::class
        ]);
    }

}
