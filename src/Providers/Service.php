<?php

namespace GeneaLabs\LaravelNovaSiteMenu\Providers;

use GeneaLabs\LaravelNovaPages\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use GeneaLabs\LaravelNovaSiteMenu\View\Components\Menu;
use GeneaLabs\LaravelNovaSiteMenu\View\Components\MenuItem;

class Service extends ServiceProvider
{
    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        // $this->loadViewComponentsAs('laravel-nova-blog', [
        //     // Post::class,
        //     // Posts::class,
        // ]);
        Blade::component('menu', Menu::class);
        Blade::component('menu-item', MenuItem::class);
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravel-nova-site-menu');

        if (! Page::ignoreMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path("migrations")
        ], 'migrations');
    }

    public function register()
    {
        // $this->loadViewsFrom(
        //     __DIR__ . '/../../resources/views',
        //     'laravel-nova-site-menu'
        // );
    }
}
