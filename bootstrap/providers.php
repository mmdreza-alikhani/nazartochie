<?php

return [
    App\Providers\AppServiceProvider::class,
    Modules\Admin\User\Providers\UserServiceProvider::class,
    Modules\Admin\Main\Providers\MainServiceProvider::class,
    Modules\Admin\Tag\Providers\TagServiceProvider::class,
    Modules\Admin\Category\Providers\CategoryServiceProvider::class,
    Modules\Admin\Post\Providers\PostServiceProvider::class,
    Modules\Admin\Comment\Providers\CommentServiceProvider::class,
    Modules\Home\Main\Providers\MainServiceProvider::class,
    Modules\Home\Post\Providers\PostServiceProvider::class,
    Modules\Home\Profile\Providers\ProfileServiceProvider::class,
    Modules\Authentication\app\Providers\AuthenticationServiceProvider::class,
];
