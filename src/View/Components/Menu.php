<?php

namespace GeneaLabs\LaravelNovaSiteMenu\View\Components;

use GeneaLabs\LaravelNovaSiteMenu\Menu as MenuModel;
use Illuminate\View\Component;

class Menu extends Component
{
    protected $menuItems;

    public function __construct(string $name)
    {
        $this->menuItems = (new MenuModel)
            ->with("menuItems.children")
            ->where("name", $name)
            ->first()
            ->menuItems()
            ->ordered()
            ->get();
    }

    public function render()
    {
        return view('laravel-nova-site-menu::components.menu');
    }
}
