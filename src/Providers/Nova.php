<?php

namespace GeneaLabs\LaravelNovaSiteMenu\Providers;

use GeneaLabs\LaravelNovaSiteMenu\Nova\Menu;
use GeneaLabs\LaravelNovaSiteMenu\Menu as MenuModel;
use GeneaLabs\LaravelNovaSiteMenu\Nova\MenuItem;
use GeneaLabs\LaravelNovaSiteMenu\MenuItem as MenuItemModel;
use Laravel\Nova\Nova as LaravelNova;
use Laravel\Nova\NovaApplicationServiceProvider;

class Nova extends NovaApplicationServiceProvider
{
    protected function resources()
    {
        Menu::$model = MenuModel::model();
        MenuItem::$model = MenuItemModel::model();

        (new LaravelNova())->resources([
            Menu::class,
            MenuItem::class,
        ]);
    }
}
