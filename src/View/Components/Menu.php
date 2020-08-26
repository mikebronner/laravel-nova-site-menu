<?php

namespace GeneaLabs\LaravelNovaSiteMenu\View\Components;

use GeneaLabs\LaravelNovaSiteMenu\Menu as MenuModel;
use Illuminate\View\Component;

class Menu extends Component
{
    public $class;
    public $menuItems;

    public function __construct(string $name)
    {
        $menuClass = MenuModel::model();
        $menu = (new $menuClass)
            ->with("menuItems.children")
            ->where("name", $name)
            ->first();
        $this->menuItems = $menu->menuItems()
            ->ordered()
            ->get();
        $this->class = $menu->class;
    }

    public function render()
    {
        return view('laravel-nova-site-menu::components.menu');
    }
}
