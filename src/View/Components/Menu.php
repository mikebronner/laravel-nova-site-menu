<?php

namespace GeneaLabs\LaravelNovaSiteMenu\View\Components;

use GeneaLabs\LaravelNovaSiteMenu\Menu as MenuModel;
use Illuminate\View\Component;

class Menu extends Component
{
    public $class;
    public $itemClass;
    public $itemActiveClass;
    public $menuItems;

    public function __construct(
        string $name,
        string $class = "",
        string $itemClass = "",
        string $itemActiveClass = ""
    ) {
        $menuClass = MenuModel::model();
        $menu = (new $menuClass)
            ->with("menuItems.children")
            ->where("name", $name)
            ->first();
        $this->menuItems = collect();

        if ($menu) {
            $this->menuItems = $menu->menuItems()
                ->ordered()
                ->get();
        }

        $this->class = $class;
        $this->itemClass = $itemClass;
        $this->itemActiveClass = $itemActiveClass;
    }

    public function render()
    {
        return view('laravel-nova-site-menu::components.menu');
    }
}
